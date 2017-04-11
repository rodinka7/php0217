<?php
require_once('classesEloquent.php');

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
    		$array = [
			    'login' => $_POST['login'],
			    'name' => $_POST['name'],
			   	'date' => $_POST['date'],
			   	'description' => $_POST['description']
			];

			$result = GUMP::is_valid($array, [
			    'login' => 'required|alpha_numeric',
			    'name' => 'required|alpha_numeric|min_len,5',
			    'date' => 'required|date',
			    'description' => 'required|min_len,50'
			]);

    		
    		$types = array('image/gif', 'image/png', 'image/jpeg');
	    	
	    	if ($result == 1) {
				if (!in_array($_FILES['image']['type'], $types)) {
					$errors[] = 'Загружайте только файлы форматов .jpg, .png, .gif!';	
				} else {
					$file = $_FILES['image']['tmp_name'];
					$filename = $_FILES['image']['name'];

					$uploadDir = dirname(__DIR__).'/img/';
				
					$uploadFile = $uploadDir . basename($filename);

					if (!move_uploaded_file($file, $uploadFile)) {
						$errors[] = 'Файл не удалось загрузить в папку!';
					} else {
						$errors[] = 'Файл успешно сохранен на сервер!';
					}

					$user = User::where('login', $_POST['login'])->first();
					$user->name = $_POST['name'];
					$user->age = $this->calculate_age($_POST['date']);
					$user->description = $_POST['description'];
					$user->image = $filename;
					$answer = $user->save();
					
					if ($answer) {
						$errors[] = 'Данные успешно сохранены в базу данных!';
					}
				}
			} else {
				foreach ($result as $item) {
					$errors[] = $item;
				}
			}

			$this->data['errors'] = $errors;		
    	} else {
    		$users = User::all();

			$this->data['users'] = $users;
    	}

    	return $this->data;
    }

    public function deleteUser() {
    	$errors;
    	
    	$user = User::find($_GET['id']);

 		$img = $user['image'];

 		$images = scandir('app/img/');
		 		
 		foreach ($images as $image) {
 			if ($image == $img) {
 				unlink('app/img/'.$img);
 			}
 		}	

 		if ($user->delete()) {
 			$errors[] = 'Пользователь был успешно удален!';
 		}

 		$this->data['errors'] = $errors;
    }
}
?>