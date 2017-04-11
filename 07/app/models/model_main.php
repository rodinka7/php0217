<?php
require_once('classesEloquent.php');

class Model_Main extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function get_data()
    {	
    	$errors;
        $data;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			session_start();

    		if (empty($_POST['login']) || empty($_POST['password'])){
    			$errors[] = 'Все поля должны быть заполнены!';
    		} else {
    			$login = $_POST['login'];
    			$password = crypt($_POST['password'], 'happy');
                
                $userData = User::where('login', $login)->first();
               
                if ($userData['password'] == $password) {
                	$data['login'] = $login;

                	$_SESSION['userId'] = $userData['id'];
                	$_SESSION['userLogin'] = $login;
                	
                    header('Location: http://php0217/05/5.2/list');
                } elseif (empty($userData)) {
                	$errors[] = 'Вы ввели неправильный логин!';
                } else {
                	$errors[] = 'Вы ввели неправильный пароль!';
                }
    		}

    		$data['errors'] = $errors;

    		return $data;
    	}
    }
}

?>