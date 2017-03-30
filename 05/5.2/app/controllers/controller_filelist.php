<?php

class Controller_filelist extends Controller {

    public function action_main() {
    	session_start();
    	
    	if (!isset($_SESSION['user']) || empty($_SESSION['user'])){
			$this->view->generate('main_view.twig', array());
		} else {
        	$this->view->generate('filelist_view.twig', array());
		}
    }
}

?>