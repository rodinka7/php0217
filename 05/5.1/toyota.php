<?php
require_once 'car.php';
require_once 'transmissionAuto.php';

class Toyota extends Car {
	use TransmissionAuto;

	public function __construct($power) {
		parent::__construct($power);

		$this->transmissionAuto();
	}
}	
?>