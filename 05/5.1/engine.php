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
			echo "Скорость равна $speed м/с<br />";
			return $speed; 
		} elseif ($speed > $power*2) {
			$newSpeed = $power*2;
			echo 'Скорость равна '.$newSpeed.'м/с. Автомобиль не может развить скорость '.$speed.' м/с! <br />';
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
?>