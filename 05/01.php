<?php
require_once 'trait.php';

class Car {
	use BackSpeed;
	
	protected function turnEngine($a){
		
	}

	protected function drive(km, speed, direction) {
		$position = 0;

		while ($position <= km) {
			$position += speed;
		}
	}
	 
}

class Opel extends Car {

}

?>