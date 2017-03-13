<?php
require_once 'config.php';

if (isset($_POST['inputEmail3']) && isset($_POST['inputPassword3'])) {

	$login = $_POST['inputEmail3'];
	$pass = $_POST['inputPassword3'];

	
	$sql = 'SELECT * FROM `autorization` ';
	$result = $connection->query($sql);
	$users = $result->fetch_all(MYSQLI_ASSOC);
	//echo '<pre>'.print_r($users,true).'</pre>';
	
	foreach ($users as $user) {
		if (($user['login'] == $login) && ($user['password'] == $pass)) {
			header('Location: http://php0217/03/list.html');
		}
	}



	
	
}
?>