<?php

trait Model_trait {
    public function get_data()
    {
        $sql = 'SELECT * FROM `users` ';
      	$result = $this->connection->query($sql);
      	
      	return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>