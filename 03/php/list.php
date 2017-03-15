<?php
require_once 'config.php';

$types = array('image/gif', 'image/png', 'image/jpeg');

if (isset($_POST['login']) && isset($_POST['name']) && isset($_POST['date']) && isset($_POST['desc']) && isset($_FILES['file']) && (in_array($_FILES['file']['type'], $types))) {
	
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
	$results = $result->fetch_all(MYSQLI_ASSOC);
	$password = '"'.$connection->real_escape_string($results[0]['password']).'"';
	$id = $results[0]['id'];
	
	$name = '"'.$connection->real_escape_string($_POST['name']).'"';
	$date = calculate_age($_POST['date']);
	$desc = '"'.$connection->real_escape_string($_POST['desc']).'"';

	$file = $_FILES['file']['tmp_name'];
	$filename = $_FILES['file']['name'];

	$image = '"'.$connection->real_escape_string($filename).'"';
	
	$connection->query("INSERT INTO users (login, password, name, age, description, photo) VALUES($login, $password, $name, $date, $desc, $image)");
	/* Сохранение в папку */
	$uploadDir = './../img/';
	$uploadFile = $uploadDir . basename($filename);

	if (move_uploaded_file($file, $uploadFile)) {
		echo 'Файл был успешно загружен <br />';
	}
	/* Сохранение в папку */
} else {
	echo 'Все поля формы должны быть заполнены! Загружайте файлы формата .jpg, .png, .gif!';
}

?>