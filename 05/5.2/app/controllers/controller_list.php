<?php

class Controller_List extends Controller {
	public function __construct(){
		parent::__construct();

		$this->model = new Model_List();
	}

    public function action_main() {
    	session_start();

    	if (empty($_SESSION['userId']) || empty($_SESSION['userLogin'])){
			$this->view->generate('main_view.twig', array());
		} else {
	        $data = $this->model->get_data();
  
	    	$users = $data['users'];
	    	$errors = $data['errors'];

        	$this->view->generate('list_view.twig', array(
        		'users' => $users,
        		'uri' => 'list',
        		'errors' => $errors
        	));
    	}
    }		
}

?>