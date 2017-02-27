<?php
/* TASK 1 */
$arr = ['Hello, world!', 'Today is a wonderful day!', 'The weather is perfect'];

function showStr($arr, $param) {
	for ($i = 0; $i < count($arr); $i++) {
		echo "<p>{$arr[$i]}</p>";
	}

	if ($param === true) {
		return implode(' ', $arr);
	}
};

echo showStr($arr, true);

echo '<hr>';
/* TASK 1 */

/* TASK 2 */
function countArr($arr, $str) {
	$result = $arr[0];

	if (!is_array($arr)) {
		echo 'Выведите массив чисел!';
	}

	switch ($str){
		case 'сложение':
			for ($i = 1; $i <= count($arr); $i++) {
				$result += $i; 
			}
			break;
		case 'вычитание':
			for ($i = 1; $i <= count($arr); $i++) {
				$result -= $arr[$i];
			}
			break;
		case 'умножение':
			for ($i = 1; $i < count($arr); $i++) {
				$result *= $arr[$i];
			}
			break;
		case 'деление':
			for ($i = 1; $i < count($arr); $i++) {
				if ($arr[$i] === 0) {
					echo 'На ноль делить нельзя!';
					break;
				};

				$result /= $arr[$i];
			}
			break;
		case 'возведение в степень':
			for ($i = 1; $i < count($arr); $i++) {
				$result = pow($result, $arr[$i]);
				echo $result;
			}
	}

	echo "result = $result";
}	

countArr([5,2,4], 'возведение в степень');
/* TASK 2 */
?>