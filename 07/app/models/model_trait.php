<?php
require_once('classesEloquent.php');

trait Model_trait {
    public function get_data()
    {
    	return User::all();
    }
}
?>