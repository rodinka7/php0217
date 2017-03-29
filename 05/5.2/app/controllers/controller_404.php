<?php

class Controller_404 extends Controller {

    public function action_index() {
        $this->view->generate('404_view.twig',
            [
                'title'=>'Ошибка 404!',
                'content'=> 'Данной страницы не существует!!!'
            ]);
    }

}

?>