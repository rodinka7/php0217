<?php
require "../07/app/vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'homework_03',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);


// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

/*Capsule::schema()->create('goods', function($table){
    $table->increments('id');
    $table->string('name')->nullable();
    $table->string('art')->nullable();
    $table->string('producer')->nullable();
    $table->integer('count')->default(0);
    $table->integer('price')->default(0);
    $table->string('category')->nullable();
});

Capsule::schema()->create('categories', function($table) {
    $table->increments('id');
    $table->string('category')->nullable();
});*/

class Good extends Illuminate\Database\Eloquent\Model {
    public $timestamps = false;
}
class Category extends Illuminate\Database\Eloquent\Model {
    public $timestamps = false;
}

?>