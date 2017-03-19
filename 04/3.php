<?php
$arr = [];
$summ;

function createArr(&$arr) {
	for ($i = 0; $i < 100; $i++) {
		$arr[] = mt_rand(0, 100);
	}
}

createArr($arr);

$file = fopen('file.csv', 'w');
fputcsv($file, $arr);
fclose($file);

$file = fopen('file.csv', 'r');
$newArr = fgetcsv($file);
fclose($file);

foreach ($newArr as $value) {
	if (!($value%2)) {
		$summ += $value;
	}
}

echo 'Сумма всех четных чисел = '.$summ;

?>