<?php

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

    			$sql = "SELECT id FROM users WHERE BINARY login=\"$login\" AND BINARY password=\"$password\"";
                
                $result = $this->connection->query($sql);
                
                $userData = $result->fetch_all(MYSQLI_ASSOC);

                if (!$userData) {
                	$errors[] = 'Вы ввели неправильный логин или пароль!';
                } else {
                	$data['login'] = $login;

                	$_SESSION['userId'] = $userData[0]['id'];
                	$_SESSION['userLogin'] = $login;

                    header('Location: http://php0217/05/5.2/list');
                }

    		}

    		$data['errors'] = $errors;

    		return $data;
    	}
    }
}

?>