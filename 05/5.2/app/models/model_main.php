<?php

class Model_main extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function get_data()
    {
        $sql = 'SELECT * FROM `autorization` ';
        $result = $this->connection->query($sql);
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>