<?php

class Controller_Filelist extends Controller {

	public function __construct(){
		parent::__construct();

		$this->model = new Model_Filelist();
	}

    public function action_main() {
    	session_start();
    	
    	if (empty($_SESSION['userId']) || empty($_SESSION['userLogin'])){
			$this->view->generate('main_view.twig', array());
		} else {
			$data = $this->model->get_data();
    	
	    	$images = $data['images'];
	    	$errors = $data['errors'];

	        $this->view->generate('filelist_view.twig', array(
	        	'uri' => 'filelist',
	        	'errors' => $errors,
	        	'images' => $images
	        ));
    	}
	}

    public function action_delete(){
    	$this->model->deleteImg();
    	header('Location: http://php0217/07/filelist');
    }
}

?>