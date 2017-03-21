<?php
require_once('config.php');
$id = $_GET['id'];

$sql = 'SELECT * FROM `users` ';
$result = $connection->query($sql);
$users = $result->fetch_all(MYSQLI_ASSOC);

foreach ($users as $user) {
	if ($user['id'] == $id) {
		$sql = 'delete from users where (id ='.$id.')';
 		$result = $connection->query($sql);

 		$img = $user['photo'];
 		$files = scandir('./img/');
 		foreach ($files as $file) {
 			if ($file == $img) {
 				unlink('./img/'.$img);
 			}
 		}
 		if ($result) {
 			echo 'Пользователь был успешно удален!';
 		}
	}
}
?>