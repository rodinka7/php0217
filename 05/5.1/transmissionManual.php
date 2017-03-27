<?php
trait TransmissionManual {
	public function transmissionManual($speed) {
		if ($speed >= 20) {
			echo 'Включилась 2 передача! <br />';
		} elseif ($speed > 0 && $speed < 20) {
			echo 'Включилась 1 передача! <br />';
		}
	}
}
?>