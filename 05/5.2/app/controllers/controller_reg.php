<?php

class Controller_reg extends Controller {

	public function __construct(){
		parent::__construct();

		$this->model = new Model();
	}

    public function action_main() {
        $this->view->generate('regist_view.twig', array(
        	'uri' => 'reg'
        ));
    }

    private function phpmailer() {
		$output = 'Пользователь '.$_POST['inputEmail3'].' зарегистрировался на сайте.<br/>';
		$output.= "<p> Логин: ".$_POST['inputEmail3'].'</p><br/>';
		$output.= "Пароль: ".$_POST['inputPassword3'];

		$mail = new PHPMailer;

		$mail->IsSMTP();
		$mail->SMTPAuth   = true;
		$mail->Host       = "smtp.yandex.ru";
		$mail->Username   = "kus-kus7@yandex.ru";
		$mail->Password ='For13ever';
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('kus-kus7@yandex.ru', 'E-mail с сайта');
		$mail->addAddress('kus-kus7@yandex.ru', 'Получатель');     // Add a recipient
		
		$mail->CharSet = 'UTF-8';
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Письмо с сайта '.date('d.m.Y H:i:s',time());
		$mail->Body    = $output;
		$mail->AltBody = $output;

		$mail->Send();		
    }

    private function recaptcha(){
    	$remoteIp = $_SERVER['REMOTE_ADDR'];
		$gRecaptchaResponse = $_REQUEST['g-recaptcha-response'];
		$recaptcha = new \ReCaptcha\ReCaptcha("6LfiVhsUAAAAALx7mXQmAxlUp_PLWhm1_lnt_rFn");
		$resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
		
		if ($resp->isSuccess()) {
		   return true;
		}
    }

    public function action_registration() {

    	if ($this->recaptcha()) {

	    	$regular = '/^[0-9a-zA-Z]+$/';

			preg_match($regular, $_POST['inputEmail3'], $matches1);
			preg_match($regular, $_POST['inputPassword3'], $matches2);
			preg_match($regular, $_POST['inputPassword4'], $matches3);

			if (!isset($_POST['inputEmail3']) || !isset($_POST['inputPassword3']) || !isset($_POST['inputPassword4'])) {
				echo 'Все поля формы должны быть заполнены!';
			} elseif (!$matches1 || !$matches2 || !$matches3) {
				echo 'В полях логин и пароль должны содержаться только латинские большие и маленькие буквы, а также цифры!';
			} elseif ($_POST['inputPassword3'] != $_POST['inputPassword4']) {
				echo 'Пароли должны совпадать!';
			} else {
				$pass = $_POST['inputPassword3']; 
				$pass2 = $_POST['inputPassword4'];

				if ($pass == $pass2) {
					$login = '"'.$this->model->connection->real_escape_string($_POST['inputEmail3']).'"';
					$passw = crypt($pass, 'happy');
					$password = '"'.$this->model->connection->real_escape_string($passw).'"';
					
					$insert_row = $this->model->connection->query("INSERT INTO autorization (login, password) VALUES($login, $password)");

					$this->phpmailer();

					if($insert_row){
						$this->view->generate('main_view.twig', array());
					} else {
					    die('Error : ('. $this->model->connection->errno .') '. $this->model->connection->error);
					}
				}
			}
		} else {
			echo 'Вы таки робот!!!';
		}
    }
}

?>