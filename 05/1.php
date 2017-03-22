<?php

trait Engine {
	private $speed;
	public $temperature = 22;

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
	}

	public function move ($power, $meters, $speed, $direction) {
		$space = 0;

		$this->speed = $this->receiveSpeed($speed, $power);
		
		if ($direction == 'forward') {
			while ($space < $meters) {
				$space += $this->speed;

				$this->temperature += ($this->speed/10)*5;
				
				$this->condition();

				echo "Автомобиль проехал $space м <br />";
			}
		} elseif ($direction == 'backward') {
			while ($space > -$meters) {
				$space -= $this->speed;

				$this->temperature += ($this->speed/10)*5;
			
				$this->condition();
				
				echo "Автомобиль проехал $space м назад <br />";
			}
		}
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

class Car {
	use Engine;
	use Transmission;
	use TransmissionBack;
}

class Niva extends Car {
	use TransmissionManual;
}	

$newNiva = new Niva(10);

$newNiva->turnEngine(true);
$newNiva->switchTransmission(true);
$newNiva->move(5, 200, 10, 'forward');
$newNiva->turnEngine(false);
$newNiva->switchTransmission(false);

?>