<?php
session_start();

if(!isset($_SESSION['user']) && empty($_SESSION['user'])){
	header('Location: http://php0217/03/index.html');
}
?>