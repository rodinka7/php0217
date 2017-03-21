<?php
require_once('config.php');
session_start();
if (isset($_POST['inputEmail3']) && isset($_POST['inputPassword3'])) {

	$login = $_POST['inputEmail3'];
	$pass = $_POST['inputPassword3'];

	
	$sql = 'SELECT * FROM `autorization` ';
	$result = $connection->query($sql);
	$users = $result->fetch_all(MYSQLI_ASSOC);

	foreach ($users as $user) {
		if (($user['login'] == $login) && ($user['password'] != crypt($pass, 'happy'))) {
			echo 'Вы ввели неверный пароль!';
			break;
		} elseif (($user['login'] == $login) && ($user['password'] == crypt($pass,'happy'))) {
			$_SESSION['user'] = $user['id'];
			header('Location: http://php0217/03.3/index.php?content=list');
		}
	}	
}
?>