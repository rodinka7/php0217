<?php
$host = 'localhost';
$base = 'homework_03';
$user = 'root';
$password = '';

$connection = new mysqli($host, $user, $password, $base);

if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
}

$connection->query('SET NAMES "UTF-8"');

?>