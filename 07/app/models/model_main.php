<?php
require_once('classesEloquent.php');

class Model_main extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function get_data()
    {
        return Autorization::all();
    }
}

?>