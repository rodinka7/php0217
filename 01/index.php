<?php
/* TASK 6 */
$BMW = [
	"model" => "X5",
	"speed" => 120,
	"doors" => 5,
	"year" => 2015
];

$Toyota = [
	"model" => "RAV4",
	"speed" => 150,
	"doors" => 4,
	"year" => 2016
];

$Opel = [
	"model" => "Astra",
	"speed" => 130,
	"doors" => 4,
	"year" => 2014
];

$arr["BMW"] = [
	"model" => "X5",
	"speed" => 120,
	"doors" => 5,
	"year" => 2015
]; 

$arr["Toyota"] = [
	"model" => "RAV4",
	"speed" => 150,
	"doors" => 4,
	"year" => 2016
];

$arr["Opel"] = [
	"model" => "Astra",
	"speed" => 130,
	"doors" => 4,
	"year" => 2014
]; 

foreach($arr as $key => $value) {
	echo "Car $key <br />";
	echo "{$key} - {$value["model"]} - {$value["speed"]} - {$value["doors"]} - {$value["year"]} <br />";
}

echo '<hr>';
/* TASK 6 */

/* TASK 7 */
echo '<table style="border-collapse: collapse"><tr>';

for ($i = 1; $i <= 10; $i++) {
	for ($j = 1; $j <= 10; $j++) {
		if (!($i % 2) && !($j % 2)) {
			echo '<td style="border: 1px solid gray; padding: 7px; color: red;">('.$i*$j.')</td>';
		} elseif (($i % 2) && ($j % 2)) {
			echo '<td style="border: 1px solid gray; padding: 7px; color: green;">['.$i*$j.']</td>';
		} else {
			echo '<td style="border: 1px solid gray; padding: 7px">'.$i*$j.'</td>';
		}
	}
	echo '</tr>';
};

echo '</table> <hr>';
/* TASK 7 */

/* TASK 8 */
$str = 'BMW OPEL TOYOTA LEXUS FORD';
$newStr = '';
$k = 0;

echo $str.'<br />';

$arr = explode(' ', $str);

echo '<pre>';
print_r ($arr);

while ($k < count($arr)) {
	if ($k === count($arr) - 1) {
		$newStr .= $arr[$k];
	} else {
		$newStr .= $arr[$k].' == ';
	}

	$k++;
}

echo $newStr;
/* TASK 8 */

?>