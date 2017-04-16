<?php
require "../07/app/vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'mydb',
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

Capsule::schema()->create('categories', function($table) {
    $table->increments('id');
    $table->string('name')->nullable();
    $table->string('description')->nullable();
});

Capsule::schema()->create('goods', function($table){
    $table->increments('id');
    $table->integer('category_id')->unsigned();
    $table->foreign('category_id')->references('id')->on('categories');
    $table->string('name')->nullable();
    $table->string('art')->nullable();
    $table->string('producer')->nullable();
    $table->integer('count')->default(0);
    $table->integer('price')->default(0);
});

class Category extends Illuminate\Database\Eloquent\Model {
    public $timestamps = false;

    public function goods() {
        return $this->hasMany('Good');
    }
}

class Good extends Illuminate\Database\Eloquent\Model {
    public $timestamps = false;

    public function category(){
        return $this->belongsTo('Category');
    }
}

$phones = array(
            array(
                'name'=> 'Smarts',
                'description'=> 'This is category with smartphones'    
            ),
            array(
                'name'=> 'IPads',
                'description'=> 'This is category with ipads'    
            )
        );

foreach ($phones as $phone) {
    $newCategory = new Category();
    $newCategory->name = $phone['name'];
    $newCategory->description = $phone['description'];
    $newCategory->save();
};

?>