<?php

class Controller_filelist extends Controller {

	public function __construct(){
		parent::__construct();

		$this->model = new Model_filelist();
	}

    public function action_main() {
    	session_start();
    	
    	if (!isset($_SESSION['user']) || empty($_SESSION['user'])){
			$this->view->generate('main_view.twig', array());
		} else {
			$photos = $this->model->get_data();
			
			foreach ($photos as $photo) {
			      if (($this->getExtension($photo) == 'jpg') 
			      || ($this->getExtension($photo) == 'png') 
			      || ($this->getExtension($photo) == 'gif')) {
			        $newPhotos[] = $photo;   
			      }    
	    	}
        	$this->view->generate('filelist_view.twig', array(
        		'photos' => $newPhotos,
        		'uri' => 'filelist'
        	));
		}
    }

    private function getExtension($filename) {
    	return end(explode(".", $filename));
    }

    public function action_delete(){

    	$routes = explode('?', $_SERVER['REQUEST_URI']);
    	$img = $routes[3];
		$response = unlink(dirname(__DIR__).'/img/'.$img);
		
		if ($response) {
			echo 'Аватарка успешно удалена!';
		}
    }
}

?>