<?php
/* TASK 1 */
$arr = ['Hello, world!', 'Today is a wonderful day!', 'The weather is perfect'];

function showStr($arr, $param = false) {
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
	if (!is_array($arr)) {
		echo 'Введите массив чисел! <br />';
	}

	for ($i = 0; $i < count($arr); $i++) {
		if (!is_int($arr[$i])) {
			echo 'В массиве должны быть только числа! <br />';
		}
	}
	switch ($str){
		case '+':
		    $result = 0;
			for ($i = 0; $i <= count($arr); $i++) {
				$result += $i; 
			}
			break;
		case '-':
            $result = $arr[0];
			for ($i = 1; $i <= count($arr); $i++) {
				$result -= $arr[$i];
			}
			break;
		case '*':
            $result = 1;
			for ($i = 0; $i < count($arr); $i++) {
				$result *= $arr[$i];
			}
			break;
		case '/':
            $result = $arr[0];
			for ($i = 1; $i < count($arr); $i++) {
				if ($arr[$i] === 0) {
					echo 'На ноль делить нельзя!';
					break;
				};
                $result /= $arr[$i];
			}
			break;
		case '**':
            $result = $arr[0];
			for ($i = 1; $i < count($arr); $i++) {
				$result = pow($result, $arr[$i]);
			}
	}
	if (is_int($result)) {
        echo "result = $result <br />";
    }
}
countArr([2,0,5], '/');
echo '<hr>';
/* TASK 2 */

/* TASK 3 */
    function calcEverything($str, ...$numbers) {
        for ($i = 0; $i < count($numbers); $i++) {
            if (!is_int($numbers[$i]) && !is_float($numbers[$i])) {
                echo 'Введите целые или вещественные числа!';
            }
        };

        switch ($str) {
            case '+':
                $result += $arr[i];
        }
    }

    calcEverything('dfd', 1,2,3,4);
/* TASK 3 */
?>