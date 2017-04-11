<?php

class Controller_Sort extends Controller {

	public function __construct(){
		parent::__construct();
		
		$this->model = new Model_Sort();
	}	


	public function action_main() {
		session_start();

		if (empty($_SESSION['userId']) || empty($_SESSION['userLogin'])){
			$this->view->generate('main_view.twig', array());
		} else {
			$data = $this->model->get_data();
    	
	    	$users = $data['users'];
	    	$errors = $data['errors'];
	    	$file = $data['file'];
	    	
	        $this->view->generate('sort_view.twig', array(
	        	'uri' => 'sort',
	        	'errors' => $errors,
	        	'users' => $users,
	        	'file' => $file
	        ));
		}    	
	}
}

?>