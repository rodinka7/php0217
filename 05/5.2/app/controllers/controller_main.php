<?php

class Controller_main extends Controller {

    public function action_main() {
        $this->view->generate('main_view.twig', array());
    }
}

?>