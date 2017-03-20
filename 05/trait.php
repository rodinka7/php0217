<?php
trait BackSpeed {
	protected function Back(km, speed){
		$position = 0;
		
		while ($position >= -km) {
			$position -= speed;
		}
	}
}
?>