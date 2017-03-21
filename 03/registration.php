<?php
require_once('config.php');
$regular = '/^[0-9a-zA-Z]+$/';

preg_match($regular, $_POST['inputEmail3'], $matches1);
preg_match($regular, $_POST['inputPassword3'], $matches2);
preg_match($regular, $_POST['inputPassword4'], $matches3);

if (!isset($_POST['inputEmail3']) || !isset($_POST['inputPassword3']) || !isset($_POST['inputPassword4'])) {
	echo 'Все поля формы должны быть заполнены!';
} elseif (!$matches1 || !$matches2 || !$matches3) {
	echo 'В полях логин и пароль должны содержаться только латинские большие и маленькие буквы, а также цифры!';
} elseif ($_POST['inputPassword3'] != $_POST['inputPassword4']) {
	echo 'Пароли должны совпадать!';
} else {
	$pass = $_POST['inputPassword3']; 
	$pass2 = $_POST['inputPassword4'];

	if ($pass == $pass2) {
		$login = '"'.$connection->real_escape_string($_POST['inputEmail3']).'"';
		$passw = crypt($pass, 'happy');
		$password = '"'.$connection->real_escape_string($passw).'"';
		
		$insert_row = $connection->query("INSERT INTO autorization (login, password) VALUES($login, $password)");

		if($insert_row){
			header('Location: http://php0217/03/index.php?content=main');
		} else {
		    die('Error : ('. $connection->errno .') '. $connection->error);
		}
	}
}
?>