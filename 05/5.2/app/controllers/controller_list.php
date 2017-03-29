<?php

class Controller_list extends Controller {

    public function action_list() {
        $this->view->generate('list_view.twig', array());
    }
}

?>