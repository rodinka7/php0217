<?php

class Controller_reg extends Controller {

    public function action_reg() {
        $this->view->generate('regist_view.twig', array());
    }
}

?>