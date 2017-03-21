<?php
require_once 'backward.php';

class Car {
	use Backward;
	
	protected function drive($km, $speed, $direction) {
		$position = 0;

		if ($direction == 'forward') {
			while ($position <= $km) {
				$position += $speed;
			}
		} elseif ($direction == 'backward') {
			while ($position >= -$km) {
				$position -= $speed;
			}
		}
	}

	protected function switchEngine($data) {
		if ($data) {
			this->switchOnEngine();
		} else {
			this->switchOutEngine();
		}
	} 

	protected function switchOnEngine() {

	}

	protected function switchOutEngine() {

	}
}

?>