<?php

class Controller_Reg extends Controller {

	public function __construct(){
		parent::__construct();

		$this->model = new Model_Reg();
	}

    public function action_main() {

        $data = $this->model->get_data();
    	
    	$login = $data['login'];
    	$errors = $data['errors'];

        $this->view->generate('regist_view.twig', array(
        	'uri' => 'reg',
        	'errors' => $errors,
        	'login' => $login
        ));
    }
}

?>