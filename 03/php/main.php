<?php
require_once 'config.php';

if (isset($_POST['inputEmail3']) && isset($_POST['inputPassword3']) && isset($_POST['inputPassword4'])) {
	$pass = $_POST['inputPassword3']; 
	$pass2 = $_POST['inputPassword4'];

	if ($pass == $pass2) {
		$login = '"'.$connection->real_escape_string($_POST['inputEmail3']).'"';
		$passw = '"'.$connection->real_escape_string($pass).'"';

		$insert_row = $connection->query("INSERT INTO autorization (login, password) VALUES($login, $passw)");

		if($insert_row){
			header('Location: http://php0217/03/index.html');
		}else{
		    die('Error : ('. $connection->errno .') '. $connection->error);
		}
	}
}
?>