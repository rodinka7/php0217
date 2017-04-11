<?php

class Controller_filelist extends Controller {

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
        		'images' => $images,
        		'uri' => 'filelist',
        		'errors' => $errors
        	));
    	}
	}

    public function action_delete(){
    	$this->model->deleteImg();

    	header('Location: http://php0217/05/5.2/filelist');    	
    }
}

?>