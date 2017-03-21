<?php
require_once('config.php');

$img = $_GET['img'];

$response = unlink('./img/'.$img);
if ($response) {
	echo 'Аватарка успешно удалена!';
}
?>