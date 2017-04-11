<?php

class Controller_Main extends Controller {
	
	public function __construct(){
		parent::__construct();

		$this->model = new Model_main();
	}

    public function action_main() {
    	$data = $this->model->get_data();
    	
    	$login = $data['login'];
    	$errors = $data['errors'];

        $this->view->generate('main_view.twig', array(
        	'uri' => 'main',
        	'errors' => $errors,
        	'login' => $login
        ));
    }

    public function action_exit(){
    	$_SESSION['userId'] = '';
    	$_SESSION['userLogin'] = '';

    	header('Location: http://php0217/05/5.2/');
    }
}

?>