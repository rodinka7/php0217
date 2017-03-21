<?php 
if ($_SERVER['REQUEST_URI'] == '/03/') {
	require_once 'mainTemplate.php'; 
} elseif ($_SERVER['REQUEST_URI'] == '/03/index.php?content=reg') {
	require_once 'regTemplate.php';
} else {
	if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
		require_once $_GET['content'].'Template.php';
	} else {
		require_once('mainTemplate.php');
	}
} 
?>