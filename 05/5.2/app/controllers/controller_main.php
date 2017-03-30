<?php

class Controller_main extends Controller {
	
	public function __construct(){
		parent::__construct();

		$this->model = new Model_main();
	}

    public function action_main() {
        $this->view->generate('main_view.twig', array());
    }

    public function action_login() {
    	session_start();
		
		$users = $this->model->get_data();
		
		if (!empty($_POST['inputEmail3']) && !empty($_POST['inputPassword3'])) {

			$login = $_POST['inputEmail3'];
			$pass = $_POST['inputPassword3'];

			foreach ($users as $user) {
				if (($user['login'] == $login) && ($user['password'] != crypt($pass, 'happy'))) {
					echo 'Вы ввели неверный пароль!';
					break;
				} elseif (($user['login'] == $login) && ($user['password'] == crypt($pass,'happy'))) {
					$_SESSION['user'] = $user['id'];
			
					$this->view->generate('list_view.twig', array());
				}
			}	
		} else {
			echo 'Поля формы должны быть заполнены!';
		}
    }
}

?>