<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

class Autorization extends Illuminate\Database\Eloquent\Model {
	protected $table = 'autorization';
	public $timestamps = false;
}

class User extends Illuminate\Database\Eloquent\Model {
	public $timestamps = false;
}

?>