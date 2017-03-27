<?php
require_once 'car.php';
require_once 'transmissionManual.php';

class Niva extends Car {
	use TransmissionManual;

	public function __construct($power) {
		parent::__construct($power);

		$this->transmissionManual($this->speed);
	}
}	
?>