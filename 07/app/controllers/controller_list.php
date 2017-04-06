<?php
require_once('app/models/classesEloquent.php');

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
	        	for ($i = 0; $i < count($users); $i++) {
	        		if ($img == $users[$i]['photo']) {
			            $users[$i]['answer'] = true;
		          	}	
	        	}
	        }

        	$this->view->generate('list_view.twig', array(
        		'users' => $users,
        		'uri' => 'list'
        	));
    	}
    }

    private function calculate_age($birth){
    	$birth_stamp = strtotime($birth);
		$age = date('Y') - date('Y', $birth_stamp);
		
		if (date('md', $birth_stamp) > date('md')) {
			$age--;
		}
		
		return $age;
    }

    public function action_addUser(){
    	
    	$array = [
		    'login' => $_POST['login'],
		    'name' => $_POST['name'],
		   	'date' => $_POST['date'],
		   	'description' => $_POST['desc']
		];

		$result = GUMP::is_valid($array, [
		    'login' => 'required|alpha_numeric',
		    'name' => 'required|alpha_numeric|min_len,5',
		    'date' => 'required|date',
		    'description' => 'required|min_len,50'
		]);

    	$types = array('image/gif', 'image/png', 'image/jpeg');
  
    	if ($result == 1) {
    		if (in_array($_FILES['file']['type'], $types)) {
			
				$login = $_POST['login'];
				$model = Autorization::where('login', '=', $login)->first();
				$password = $model['attributes']['password'];

				$file = $_FILES['file']['tmp_name'];
				$filename = $_FILES['file']['name'];

				$user = new User();
				$user->login = $login;
				$user->name = $_POST['name'];
				$user->password = $password;
				$user->age = $this->calculate_age($_POST['date']);
				$user->description = $_POST['desc'];
				$user->photo = $filename;
				$answer = $user->save();
				
				if ($answer) {
					echo 'Данные успешно сохранены в базу данных! <br>';
				}

				/* Сохранение в папку */
				
				$uploadDir = dirname(__DIR__).'/img/';
				
				$uploadFile = $uploadDir . basename($filename);

				if (!move_uploaded_file($file, $uploadFile)) {
					echo 'Файл не удалось загрузить в папку! <br />';
				}
				/* Сохранение в папку */
	    	} else echo 'Загружайте только файлы форматов .jpg, .png, .gif!';

    	} else {
    		foreach ($result as $item) {
    			echo $item.'<br>';
    		}
    	}
    }

    public function action_delete() {
    	$routes = explode('?', $_SERVER['REQUEST_URI']);
    	$id = $routes[3];

    	$user = User::find($id);
    	$img = $user['photo'];

    	$files = scandir('app/img/');
		 		
 		foreach ($files as $file) {
 			if ($file == $img) {
 				unlink('app/img/'.$img);
 			}
 		}
 		if ($user->delete()) {
 			echo 'Пользователь был успешно удален!';
 		}
    }
}

?>