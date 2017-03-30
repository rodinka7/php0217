<?php

class Model_list extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function get_data()
    {
        $sql = 'SELECT * FROM `users` ';
      	$result = $this->connection->query($sql);
      	
      	return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>