<?php

class Engine {
	public function turnEngine ($turn) {
		if ($turn) {
			echo 'Двигатель включен! <br />';
		} else {
			echo 'Двигатель выключен! <br />';
		}
	}

	public function receiveSpeed ($speed, $power) {
		if ($speed <= $power*2) {
			echo "Скорость равна $speed <br />";
			return $speed; 
		} elseif ($speed > $power*2) {
			$newSpeed = $power*2;
			echo 'Скорость равна '.$newSpeed.'м/с. Автомобиль не может развить скорость '.$speed.'! <br />';
			return $power*2;
		}
	}

	public function condition() {
		if ($this->temperature >= 90) {
			echo "Включаем вентилятор. Двигатель перегрелся, и его температура составляет $this->temperature <br />";
			$this->turnOncondition();
		}
	}

	private function turnOncondition(){
		$this->temperature -= 10;
		echo "Температура снизилась. Теперь она составляет $this->temperature <br />";
		$this->condition();
	}
}

trait Transmission {
	public function switchTransmission($turn){
		if ($turn) {
			echo 'Вы включили передачу! <br />';
		} else {
			echo 'Передача выключена! <br />'; 
		}
	}
}

trait TransmissionAuto {
	public function transmissionAuto () {
		echo 'У автомобиля автоматическая коробка передач! <br />';
	}
}

trait TransmissionManual {
	public function transmissionManual($speed) {
		if ($speed >= 20) {
			echo 'Включилась 2 передача! <br />';
		} elseif ($speed > 0 && $speed < 20) {
			echo 'Включилась 1 передача! <br />';
		}
	}
}

trait TransmissionBack {
	public function transmissionBackward () {
		echo 'Вы включили заднюю передачу! <br />';
	}
}

class Car extends Engine{

	use Transmission;
	use TransmissionBack;
	use TransmissionManual;
	use TransmissionAuto;
}

class Niva extends Car {
	private $speed;
	public $temperature = 22;
	private $power;

	public function __construct($power) {
		$this->power = $power;
	}

	public function move ($time, $speed, $direction) {
		$seconds = 1;
		$space = 0;

		$power = $this->power;

		if ($direction == 'backward') {
			$this->transmissionBackward();
		}

		$this->speed = $this->receiveSpeed($speed, $power);

		$this->transmissionManual($this->speed);
		
		if ($direction == 'forward') {
			while ($seconds <= $time) {
				$space += $this->speed;

				$this->temperature += ($this->speed/10)*5;

				echo "Автомобиль проехал $space метров за $seconds секунд<br />";

				$this->condition();

				$seconds++;
			}

		} elseif ($direction == 'backward') {
			while ($seconds <= $time) {
				$space -= $this->speed;

				$this->temperature += ($this->speed/10)*5;
				
				echo "Автомобиль проехал $space метров назад за $seconds секунд<br />";
				$this->condition();
				$seconds++;
			}
		}
	}
}	

class Toyota extends Car {
	private $speed;
	public $temperature = 22;
	private $power;

	public function __construct($power) {
		$this->power = $power;
	}

	public function move ($time, $speed, $direction) {
		$seconds = 1;
		$space = 0;

		$power = $this->power;

		if ($direction == 'backward') {
			$this->transmissionBackward();
		}

		$this->speed = $this->receiveSpeed($speed, $power);

		$this->transmissionAuto();
		
		if ($direction == 'forward') {
			while ($seconds <= $time) {
				$space += $this->speed;

				$this->temperature += ($this->speed/10)*5;
				
				echo "Автомобиль проехал $space метров за $seconds секунд<br />";

				$this->condition();

				$seconds++;
			}

		} elseif ($direction == 'backward') {
			while ($seconds <= $time) {
				$space -= $this->speed;

				$this->temperature += ($this->speed/10)*5;
				
				echo "Автомобиль проехал $space метров назад за $seconds секунд<br />";

				$this->condition();

				$seconds++;
			}
		}
	}
}	

$newNiva = new Niva(30);

$newNiva->turnEngine(true);
$newNiva->switchTransmission(true);
$newNiva->move(3, 200, 'backward');
$newNiva->turnEngine(false);
$newNiva->switchTransmission(false);

echo '<hr>';
$newToyota = new Toyota(80);

$newToyota->turnEngine(true);
$newToyota->switchTransmission(true);
$newToyota->move(5, 300, 'forward');
$newToyota->turnEngine(false);
$newToyota->switchTransmission(false);
?>