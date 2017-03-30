<?php

class Controller_list extends Controller {
	public function __construct(){
		parent::__construct();

		$this->model = new Model();
		$this->modelList = new Model_list();
	}

    public function action_main() {
    	session_start();
    	$users = $this->modelList->get_data();

    	if (!isset($_SESSION['user']) || empty($_SESSION['user'])){
			$this->view->generate('main_view.twig', array());
		} else {
			$imgs = scandir(dirname(__DIR__).'/img/');
	        
	        foreach ($imgs as $img) {
	        	foreach ($users as $user) {
		          
		          if ($img == $user['photo']) {
		            $user['answer'] = true;
		            echo '<td><img src="./img/'.$user['photo'].'" style="width: 200px;"></td>';
		          }
		          
	        	}
	        }
	        

	        if (!$answer) {
	          echo '<td>У пользователя удалена аватарка :(</td>';
	        }

        	$this->view->generate('list_view.twig', array(
        		'users' => $users
        	));
    	}
    }

    public function action_addUser(){
    	$types = array('image/gif', 'image/png', 'image/jpeg');
    	$regular = '/[0-9]{2}-[0-9]{2}-[0-9]{4}/';

    	preg_match($regular, $_POST['date'], $match);

		if (!isset($_POST['login']) || !isset($_POST['name']) || !isset($_POST['date']) || !isset($_POST['desc']) || !isset($_FILES['file'])) {
			echo 'Все поля формы должны быть заполнены!';
		} elseif (!in_array($_FILES['file']['type'], $types)) {
			echo 'Загружайте только файлы форматов .jpg, .png, .gif!';
		} elseif (!$match) {
			echo 'Дата должна быть введена в формате 24-05-1987';
		} else {
			
			function calculate_age($birth) {
				$birth_stamp = strtotime($birth);
				$age = date('Y') - date('Y', $birth_stamp);
				
				if (date('md', $birth_stamp) > date('md')) {
					$age--;
				}
				
				return $age;
			}
			
			$login = '"'.$this->model->connection->real_escape_string($_POST['login']).'"';

			$pass = 'SELECT password FROM autorization WHERE login ='.$login.';';
			$result = $this->model->connection->query($pass);
			$results = $result->fetch_all(MYSQLI_ASSOC);
			$password = '"'.$this->model->connection->real_escape_string($results[0]['password']).'"';
			$id = $results[0]['id'];
			
			$name = '"'.$this->model->connection->real_escape_string($_POST['name']).'"';
			$date = calculate_age($_POST['date']);
			$desc = '"'.$this->model->connection->real_escape_string($_POST['desc']).'"';

			$file = $_FILES['file']['tmp_name'];
			$filename = $_FILES['file']['name'];

			$image = '"'.$this->model->connection->real_escape_string($filename).'"';
			
			if ($this->model->connection->query("INSERT INTO users (login, password, name, age, description, photo) VALUES($login, $password, $name, $date, $desc, $image)")) {
				echo 'Данные успешно загружены в базу данных!';
			}

			/* Сохранение в папку */
			
			$uploadDir = dirname(__DIR__).'/img/';
			
			$uploadFile = $uploadDir . basename($filename);

			if (!move_uploaded_file($file, $uploadFile)) {
				echo 'Файл не удалось загрузить в папку! <br />';
			}
			/* Сохранение в папку */
		}
    }
}

?>