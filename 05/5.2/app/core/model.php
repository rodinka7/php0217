<?php

class Model {

	public $connection;

	public function __construct(){
		$host = 'localhost';
		$base = 'homework_03';
		$user = 'root';
		$password = '';

		$this->connection = new mysqli($host, $user, $password, $base);

		if (mysqli_connect_errno()) {
		    die(mysqli_connect_error());
		}

		$this->connection->query('SET NAMES "UTF-8"');
	}   
}

?>