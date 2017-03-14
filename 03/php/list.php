<?php
require_once 'config.php';
require_once 'secure.php';

if (isset($_POST['login']) && isset($_POST['name']) && isset($_POST['date']) && isset($_POST['desc']) && isset($_POST['file'])) {
	
	function calculate_age($birth) {
		$birth_stamp = strtotime($birth);
		$age = date('Y') - date('Y', $birth_stamp);
		
		if (date('md', $birth_stamp) > date('md')) {
			$age--;
		}
		
		return $age;
	}

	echo calculate_age($_POST['date']);
	$login = '"'.$connection->real_escape_string($_POST['login']).'"';
	$name = '"'.$connection->real_escape_string($_POST['name']).'"';
	//$date = '"'.$connection->real_escape_string($_POST['date']).'"';
	$desc = '"'.$connection->real_escape_string($_POST['desc']).'"';
	$file = '"'.$connection->real_escape_string($_POST['file']).'"';

	/*$insert_row = $connection->query("INSERT INTO users (login, password, name, age, description, photo) VALUES($login, $passw)");

		if($insert_row){
			header('Location: http://php0217/03/index.html');
		} else {
		    die('Error : ('. $connection->errno .') '. $connection->error);
		}
	}
	echo '<div>Вы не зарегистрированы! Зарегистрируйтесь, пожалуйста!</div>';*/
}

?>