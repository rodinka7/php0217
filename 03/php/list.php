<?php
require_once 'config.php';

if (isset($_POST['login']) && isset($_POST['name']) && isset($_POST['date']) && isset($_POST['desc']) && isset($_FILES['file'])) {
	
	function calculate_age($birth) {
		$birth_stamp = strtotime($birth);
		$age = date('Y') - date('Y', $birth_stamp);
		
		if (date('md', $birth_stamp) > date('md')) {
			$age--;
		}
		
		return $age;
	}
	
	$login = '"'.$connection->real_escape_string($_POST['login']).'"';

	$pass = 'SELECT password FROM autorization WHERE login ='.$login.';';
	$result = $connection->query($pass);
	$passwords = $result->fetch_all(MYSQLI_ASSOC);
	$password = $passwords[0]['password'];
	
	$name = '"'.$connection->real_escape_string($_POST['name']).'"';
	$date = '"'.$connection->real_escape_string($_POST['date']).'"';
	$desc = '"'.$connection->real_escape_string($_POST['desc']).'"';
}

?>