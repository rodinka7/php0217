<?php

class Model_Sort extends Model {
	public $data;

    public function __construct(){
        parent::__construct();
    }

    public function get_data() {
    	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    		$sql = 'SELECT * FROM `users` ';
	  		$result = $this->connection->query($sql);
	  		$users = $result->fetch_all(MYSQLI_ASSOC);

	  		foreach ($users as $user) {
				if ($user['age'] < 18) {
					$newUsers[] = array(
						'login' => $user['login'],
						'age' => $user['age'],
						'sort' => 'Несовершеннолетний!'
					);
				} else {
					$newUsers[] = array(
						'login' => $user['login'],
						'age' => $user['age'],
						'sort' => 'Совершеннолетний!'
					);
				}
			}
			$this->data['users'] = $newUsers;

			return $this->data;

    	} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    		$file;

    		$sql = 'SELECT * FROM `users` ';
	  		$result = $this->connection->query($sql);
	  		$users = $result->fetch_all(MYSQLI_ASSOC);

	  		foreach ($users as $user) {
				if ($user['login'] == $_POST['login']) {
					$file['login'] = $user['login'];
					$file['image'] = $user['image'];
				}
			}

			$this->data['file'] = $file;

			return $this->data;
    	}
    }
}

?>