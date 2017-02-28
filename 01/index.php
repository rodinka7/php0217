<?php
/* TASK 1 */
$name = 'Tania';
$age = '29';

echo "My name is $name <br />";
echo "I'm $age years old <br />";
echo "\"!|\\/'\"\\ <hr>";
/* TASK 1 */

/* TASK 2 */
$pictures = 80;
$picturesMarker = 23;
$picturesPencil = 40;

echo "На школьной выставке $pictures рисунков <br />";
echo "Из них $picturesMarker нарисованы фломастерами, $picturesPencil - карандашами, а остальные - красками. Сколько рисунков нарисованы красками? <br />";
echo "Красками нарисовано: $pictures - $picturesMarker - $picturesPencil = ".($pictures - $picturesMarker - $picturesPencil).' картинок <hr>';
/* TASK 2 */

/* TASK 3 */
const CONSTANT = 'Hello, world!';

if (defined('CONSTANT') == true) {
	echo "Константа CONSTANT существует! <br />";
}

echo CONSTANT.'<br />';
echo 'Переопределяю константу ... и <br />';

define('CONSTANT', 100);

echo CONSTANT.'<hr>';
/* TASK 3 */

/* TASK 4 */
$age = 5;
echo "Ваш возраст: $age <br />";
if (($age >= 18) && ($age <= 65)) {
	echo 'Вам еще работать и работать! <hr>';
} elseif ($age > 65) {
	echo 'Вам пора на пенсию. <hr>';
} elseif (($age < 18) && ($age >= 1)) {
	echo 'Вам еще рано работать! <hr>';
} else {
	echo 'Неизвестный возраст! <hr>';
}
/* TASK 4 */

/* TASK 5 */
$day = 8;
echo "День $day-й <br />";

switch($day) {
	case 1:
	case 2:
	case 3:
	case 4:
	case 5:
		echo 'Это рабочий день!';
		break;
	case 6:
	case 7:
		echo 'Это выходной день!';
		break;
	default: 
		echo 'Вы ввели неизвестный день!';
}
echo '<hr>';

/* TASK 5 */

/* TASK 6 */
$BMW = [
	"model" => "X5",
	"speed" => 120,
	"doors" => 5,
	"year" => 2015
];

$TOYOTA = [
	"model" => "RAV4",
	"speed" => 150,
	"doors" => 4,
	"year" => 2016
];

$OPEL = [
	"model" => "Astra",
	"speed" => 130,
	"doors" => 4,
	"year" => 2014
];

$arr['BMW'] = $BMW;
$arr['TOYOTA'] = $TOYOTA;
$arr['OPEL'] = $OPEL;

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

echo $str.'<br />';

$arr = explode(' ', $str);

echo '<pre>';
print_r ($arr);

$k = count($arr) - 1;

while ($k >= 0) {
	if ($k) {
		$newStr .= $arr[$k].' == ';	
	} else {
		$newStr .= $arr[$k];
	}
	
	$k--;
}
echo $newStr;
/* TASK 8 */
?>