<?php
require_once('app/models/classesEloquent.php');

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

    private function getIp() {
		  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $ip = $_SERVER['HTTP_CLIENT_IP'];
		  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		  } else {
		    $ip = $_SERVER['REMOTE_ADDR'];
		  }
		  
		  return $ip;
	}

    public function action_registration() {

    	if ($this->recaptcha()) {

			$array = [
			    'login' => $_POST['inputEmail3'],
			    'password' => $_POST['inputPassword3'],
			   	'password2' => $_POST['inputPassword4'],
			    'ip' => $this->getIp()
			];

			$result = GUMP::is_valid($array, [
			    'login' => 'required|alpha_numeric',
			    'password' => 'required|alpha_numeric|max_len,20|min_len,6',
			    'password2' => 'required|alpha_numeric|max_len,20|min_len,6',
			    'ip' => 'valid_ip'
			]);

			if ($result == 1) {
				if ($_POST['inputPassword3'] == $_POST['inputPassword4']) {
					$pass = $_POST['inputPassword3']; 
					$pass2 = $_POST['inputPassword4'];
					$ip = $this->getIp();
					
					if ($pass == $pass2) {
						$user = new Autorization;
						$user->login = $_POST['inputEmail3'];
						$user->password = crypt($pass, 'happy');
						$user->ip = $ip;
						$answer = $user->save();

						if ($answer) {
							echo 'Данные успешно сохранены в базу данных!';
						}

						$this->phpmailer();
						
						$this->view->generate('main_view.twig', array());
					}
				} else {
					echo 'Пароли должны совпадать!';
				}
			} else {
				foreach ($result as $item) {
					echo $item.'<br>';
				}
			}
		} else {
			echo 'Вы таки робот!!!';
		}
    }
}

?>