<?php

class Model_Reg extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_data(){
		$errors;
		$data;

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$regular = '/^[0-9a-zA-Z]+$/';
			$regularMail = "|^([a-z0-9_.-]{1,20})@([a-z0-9.-]{1,20}).([a-z]{2,4})|is";

			preg_match($regular, $_POST['login'], $matchLogin);
			preg_match($regularMail, $_POST['email'], $matchEmail);

			$sql = 'SELECT * FROM `users` ';
      		$result = $this->connection->query($sql);
      	
      		$users = $result->fetch_all(MYSQLI_ASSOC);
			
      		foreach ($users as $user) {
      			if ($_POST['login'] == $user['login']) {
      				$errors[] = 'Такой пользователь уже существует!';
      			} else {
					if (empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['passwordCheck'])) {
						$errors[] = 'Все поля должны быть заполнены!';
					} elseif (empty($matchLogin)) {
						$errors[] = 'Логин должен содержать только латинские буквы и цифры!';
					} elseif (empty($matchEmail)) {
						$errors[] = 'Неверный формат электронной почты!';
					} elseif ($_POST['passwordCheck'] != $_POST['password']) {
						$errors[] = 'Пароли должны совпадать!';
					} elseif (!$this->recaptcha()) {
						$errors[] = 'Вы РОБОТ!!!!!';
					} else {
						$login = '"'.$this->connection->real_escape_string($_POST['login']).'"';
						$email = '"'.$this->connection->real_escape_string($_POST['email']).'"';
						$passw = crypt($pass, 'happy');
						$password = '"'.$this->connection->real_escape_string($passw).'"';
						
						$insert_row = $this->connection->query("INSERT INTO users (login, password, email) VALUES($login, $password, $email)");

						if ($insert_row) {
							$errors[] = 'Данные успешно сохранены в базу данных!';
							$this->sendMail($_POST['email']);
							$data['login'] = $_POST['login'];

							header('Location: http://php0217/05/5.2/');
						} else {
							$errors[] = 'При сохранении в базу данных возникла ошибка :(';
						}
					}
				}
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


}

?>