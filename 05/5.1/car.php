<?php
require_once 'engine.php';
require_once 'transmissionBack.php';
require_once 'transmission.php';

class Car extends Engine{

	use Transmission;
	use TransmissionBack;

	const FORWARD = 'forward';
	const BACKWARD = 'backward';

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

		if ($direction == Car::BACKWARD) {
			$this->transmissionBackward();
		}

		$this->speed = $this->receiveSpeed($speed, $power);
		
		if ($direction == Car::FORWARD) {
			while ($seconds <= $time) {
				$space += $this->speed;

				$this->temperature += ($this->speed/10)*5;

				echo "Автомобиль проехал $space метров за $seconds секунд<br />";

				$this->condition();

				$seconds++;
			}

		} elseif ($direction == Car::BACKWARD) {
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
?>