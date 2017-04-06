<?php

class Controller_sort extends Controller {

	public function __construct(){
		parent::__construct();
		
		$this->model = new Model_sort();
	}	


	public function action_main() {
		session_start();

		if (!isset($_SESSION['user']) || empty($_SESSION['user'])){
			$this->view->generate('main_view.twig', array());
		} else {
			$users = $this->model->get_data();

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

			$this->view->generate('sort_view.twig', array(
				'users' => $newUsers,
				'uri' => 'sort'
			));
		}    	
	}

	public function action_receive() {
		$users = $this->model->get_data();

		foreach ($users as $user) {
			if ($user['login'] == $_POST['inputEmail3']) {
				$file['login'] = $user['login'];
				$file['photo'] = $user['photo'];
			}
		}

		$this->view->generate('sort_view.twig', array(
			'file' => $file,
			'uri' => 'sort'
		));
	}
}

?>