<?php
require_once('classesEloquent.php');

class Model_Reg extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_data(){
		$errors;
		$data;

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->recaptcha()) {

				$array = [
				    'login' => $_POST['login'],
				    'email' => $_POST['email'],
				    'password' => $_POST['password'],
				    'passwordCheck' => $_POST['passwordCheck'],
				    'ip' => $this->getIp()
				];

				$result = GUMP::is_valid($array, [
				    'login' => 'required|alpha_numeric',
				    'email' => 'required|valid_email',
				    'password' => 'required|alpha_numeric|max_len,20|min_len,6',
				    'passwordCheck' => 'required|alpha_numeric|max_len,20|min_len,6',
				    'ip' => 'valid_ip'
				]);

				if ($result == 1) {
					$user = User::where('login', $_POST['login'])->first();

					if ($user) {
						$errors[] = 'Такой пользователь уже существует!';
					} elseif ($_POST['password'] == $_POST['passwordCheck']) {
						$ip = $this->getIp();
						
						$user = new User;
						$user->login = $_POST['login'];
						$user->email = $_POST['email'];
						$user->password = crypt($_POST['password'], 'happy');
						$user->ip = $ip;
						$answer = $user->save();

						if (!$answer) {
							$errors[] = 'При сохранении в базу данных произошла ошибка!';
						}

						$this->sendMail($_POST['email']);
						header('Location: http://php0217/07/list');
					} else {
						$errors[] = 'Пароли должны совпадать!';
					}
				} else {
					foreach ($result as $item) {
						$errors[] = $item;
					}
				}
			} else {
				$errors[] = 'Вы таки робот!!!';
			}

			$data['errors'] = $errors;

			return $data;
    	}		
	}

	private function sendMail($mail) {
		$output = 'Пользователь '.$_POST['login'].' зарегистрировался на сайте.<br/>';
		$output.= "<p> Логин: ".$_POST['login'].'</p><br/>';
		$output.= "Электронная почта: ".$_POST['email'];

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
}
?>