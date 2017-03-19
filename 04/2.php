<?php
$arr = [			
			"name" => 'Terry',
			"address" => [
				"country" => "USA",
				"state" => "CA",
				"city" => "Las Vegas",
				"streeet" => "1-st avenue"
			],
			"occupation" => "web developer",
			"interests" => ["swimming", "surfing", "jogging"]
		];

$json = json_encode($arr);

file_put_contents('output.json', $json);

$json2 = file_get_contents('output2.json');

$arr2 = json_decode($json2, true);

function compare ($a, $b) {
	if ($a == $b) {
		echo 'Изменений нет!';
	} else {
		if ($a['name'] != $b['name']) {
			echo 'Внесены изменения: <br />';
			echo 'Старый вариант name = '.$a['name'].'<br />';
			echo 'Новый вариант name = '.$b['name'].'<br />';
		}
		if ($a['occupation'] != $b['occupation']) {
			echo 'Внесены изменения: <br />';
			echo 'Старый вариант occupation = '.$a['occupation'].'<br />';
			echo 'Новый вариант occupation = '.$b['occupation'].'<br />';
		}
		if ($a['address'] != $b['address']) {
			echo 'Внесены изменения: <br />';
			echo '<pre> Старый вариант <br/>';
			print_r(array_diff($a['address'], $b['address']));
			echo '<pre> Новый вариант <br />';
			print_r(array_diff($b['address'], $a['address']));
		}
		if ($a['interests'] != $b['interests']) {
			echo 'Внесены изменения: <br />';
			echo '<pre> Старый вариант <br />';
			print_r(array_diff($a['interests'], $b['interests']));
			echo '<pre> Новый вариант <br />';
			print_r(array_diff($b['interests'], $a['interests']));
		}
	}
}

compare($arr, $arr2);
?>