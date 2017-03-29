<?php

class Controller_filelist extends Controller {

    public function action_filelist() {
        $this->view->generate('filelist_view.twig', array());
    }
}

?>