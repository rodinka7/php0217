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
  
	    	$file = $data['file'];
	    	$users = $data['users'];
	    	$errors = $data['errors'];
          
        	$this->view->generate('sort_view.twig', array(
        		'users' => $users,
        		'uri' => 'sort',
        		'file' => $file,
        		'errors' => $errors
        	));
		}    	
	}
}

?>