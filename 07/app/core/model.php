<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class Model {
	private $capsule;

	public function __construct(){

		$this->capsule = new Capsule;

		$this->capsule->addConnection([
		    'driver'    => 'mysql',
		    'host'      => 'localhost',
		    'database'  => 'homework_03',
		    'username'  => 'root',
		    'password'  => '',
		    'charset'   => 'utf8',
		    'collation' => 'utf8_unicode_ci',
		    'prefix'    => '',
		]);

		$this->capsule->setAsGlobal();

		$this->capsule->bootEloquent();
	}  
}

?>