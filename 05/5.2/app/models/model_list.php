<?php

class Model_List extends Model {
	public $data;

    public function __construct(){
        parent::__construct();
    }

    private function calculate_age($birth) {
    	$birth_stamp = strtotime($birth);
		$age = date('Y') - date('Y', $birth_stamp);
		
		if (date('md', $birth_stamp) > date('md')) {
			$age--;
		}
		return $age;
    }

    public function get_data() {
    	$errors;

    	session_start();

    	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    		
    		$types = array('image/gif', 'image/png', 'image/jpeg');
	    	$regular = '/[0-9]{2}-[0-9]{2}-[0-9]{4}/';

	    	preg_match($regular, $_POST['date'], $match);
	    	
	    	if (empty($_POST['login']) || empty($_POST['name']) || empty($_POST['date']) || empty($_POST['description']) || empty($_FILES['image'])) {
				$errors[] = 'Все поля формы должны быть заполнены!';
			} elseif (!in_array($_FILES['image']['type'], $types)) {
				$errors[] = 'Загружайте только файлы форматов .jpg, .png, .gif!';
			} elseif (empty($match)) {
				$errors[] = 'Дата должна быть введена в формате 24-05-1987';
			} else {
				
				$file = $_FILES['image']['tmp_name'];
				$filename = $_FILES['image']['name'];

				$name = $_POST['name'];
				$age = $this->calculate_age($_POST['date']);
				$description = $_POST['description'];

				$uploadDir = dirname(__DIR__).'/img/';
				
				$uploadFile = $uploadDir . basename($filename);

				if (!move_uploaded_file($file, $uploadFile)) {
					$errors[] = 'Файл не удалось загрузить в папку!';
				} else {
					$errors[] = 'Файл успешно сохранен на сервер!';
				}

				$sql = "UPDATE users SET name=\"$name\", age=\"$age\", description=\"$description\", image=\"$filename\"WHERE id=$_SESSION[userId]";
		        $result = $this->connection->query($sql);
		        
		        if ($result) {
		            $errors[] = 'Данные успешно сохранены в базу данных';
		        } else {
		        	$errors[] = 'При сохранении в базу данных возникла ошибка :(';
		        }
			}		
			
			$this->data['errors'] = $errors;
    	} else {
    		$sql = 'SELECT * from `users`';
			$result = $this->connection->query($sql);
			$users = $result->fetch_all(MYSQLI_ASSOC);	

			$this->data['users'] = $users;
    	}

    	return $this->data;
    }

    public function deleteUser() {
    	$userId = $_GET['id'];
    	
 		$sql = "SELECT image FROM users WHERE id = $userId";
 		$result = $this->connection->query($sql); 	
 		$userImage = $result->fetch_assoc();

 		$img = $userImage['image'];

 		$images = scandir('app/img/');
		 		
 		foreach ($images as $image) {
 			if ($image == $img) {
 				unlink('app/img/'.$img);
 			}
 		}	

 		$sql = 'delete from users where (id ='.$userId.')';
 		$result = $this->connection->query($sql);

 		if ($result) {
 			$errors[] = 'Пользователь был успешно удален!';
 		}

 		$this->data['errors'] = $errors;
    }
}
?>