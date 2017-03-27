<?php

trait Transmission {
	public function switchTransmission($turn){
		if ($turn) {
			echo 'Вы включили передачу! <br />';
		} else {
			echo 'Передача выключена! <br />'; 
		}
	}
}

?>