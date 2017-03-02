<?php
header('Content-type: text/html; charset=utf-8');

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
function inverse($x) {
    if (!$x) {
        throw new Exception('На ноль делить нельзя! <br />');
    }
}

function testStr($str) {
    if (($str != '+') && ($str != '-') && ($str != '*') &&
        ($str != '/') && ($str != '**')) {
        throw new Exception('Введите строку, описывающую арифметическое действие! <br />');
    }
}

function calc($str, $numbers) {
    switch ($str) {
        case '+':
            $result = 0;
            for ($i = 0; $i < count($numbers); $i++) {
                if ($i !== (count($numbers) - 1)) {
                    $newStr .= $numbers[$i].' + ';
                } else {
                    $newStr .= $numbers[$i].' = ';
                };
                $result += $numbers[$i];
            };
            break;
        case '-':
            $result = $numbers[0];
            $newStr = $numbers[0].' - ';
            for ($i = 1; $i < count($numbers); $i++) {
                if ($i !== (count($numbers) - 1)) {
                    $newStr .= $numbers[$i].' - ';
                } else {
                    $newStr .= $numbers[$i].' = ';
                };
                $result -= $numbers[$i];
            };
            break;
        case '*':
            $result = 1;

            for ($i = 0; $i < count($numbers); $i++) {
                if ($i !== (count($numbers) - 1)) {
                    $newStr .= $numbers[$i].' * ';
                } else {
                    $newStr .= $numbers[$i].' = ';
                };
                $result *= $numbers[$i];
            };
            break;
        case '/':
            $result = $numbers[0];
            $newStr = $numbers[0].' / ';

            for ($i = 1; $i < count($numbers); $i++) {
                try {
                    inverse($numbers[$i]);
                } catch (Exception $e) {
                    echo 'Ошибка: '.$e->getMessage().'<br />';
                    break;
                }

                if ($i !== (count($numbers) - 1)) {
                    $newStr .= $numbers[$i].' / ';
                } else {
                    $newStr .= $numbers[$i].' = ';
                };
                $result /= $numbers[$i];
            };
            break;
        case '**':
            $result = 1;
            for ($i = 0; $i < count($numbers); $i++) {
                if ($i !== (count($numbers) - 1)) {
                    $newStr .= $numbers[$i].' ** ';
                } else {
                    $newStr .= $numbers[$i].' = ';
                };
                $result = pow($result, $numbers[$i]);
            };
    }

    echo $newStr.$result;
}

function countArr($arr, $str) {
	if (!is_array($arr)) {
		echo 'Введите массив чисел! <br />';
		return;
	}

	for ($i = 0; $i < count($arr); $i++) {
		if (!is_int($arr[$i])) {
			echo 'В массиве должны быть только числа! <br />';
			return;
		}
	}

	try {
        testStr($str);
    } catch (Exception $e) {
	    echo 'Ошибка: '.$e->getMessage().'<br />';
	    return;
    }

	calc($str, $arr);
}

countArr([2,1,6], '*');

echo '<hr>';
/* TASK 2 */

/* TASK 3 */
function calcEverything($str, ...$numbers) {
    for ($i = 0; $i < count($numbers); $i++) {
        if (!is_int($numbers[$i]) && !is_float($numbers[$i])) {
            echo 'Введите целые или вещественные числа! <br />';
            return;
        }
    };

    try {
        testStr($str);
    } catch (Exception $e) {
        echo 'Ошибка: '.$e->getMessage().'<br />';
        return;
    }

    calc($str, $numbers);
}

calcEverything('+', 1, 2.5, 3, 4);

echo '<hr>';
/* TASK 3 */

/* TASK 4 */
function testNumber($a, $b) {
    if (!is_int($a) && !is_int($b)) {
        throw new Exception('Введите целые числа!');
    }
}

function createTable($a, $b) {
    try {
        testNumber($a, $b);
    } catch (Exception $e) {
        echo 'Ошибка: '.$e->getMessage().'<br />';
        return;
    }

    echo '<table style="border-collapse: collapse;">';
    for ($i = 1; $i <= $b; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= $a; $j++) {
           echo '<td style="padding: 10px; border: 1px solid gray">'.$j*$i.'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    echo "Выведена таблица $a x $b";
};

createTable(8,7);
echo '<hr>';
/* TASK 4 */

/* TASK 5 */
function isPalindrom($str) {
    $newStr = str_replace(' ', '', mb_strtolower($str, 'UTF-8'));
    $length = strlen($newStr);
    $halfLength = floor($length / 2);

    for ($i = 0; $i <= $halfLength; $i++) {
        if ($newStr[$i] != $newStr[$length - 1 - $i]) {
            return false;
        }
    }
    return true;
};

function answerPalindrom($str) {
    if (isPalindrom($str)) {
        echo "Ура! Строка {$str} является палиндромом!";
    } else {
        echo "Эхх! Строка {$str} не является палиндромом!";
    }
}

answerPalindrom('albC knKcbla');
echo '<hr>';
/* TASK 5 */

/* TASK 6 */
echo 'Сегодняшняя дата - '.date('d.m.Y H:i').'<br />';
echo 'Время unixtime 24-02-2016 00:00:00 = '.strtotime('24-02-2016 00:00:00');
echo '<hr>';
/* TASK 6 */

/* TASK 7 */
$str = 'Карл у Клары украл Кораллы';
$str2 = 'Две бутылки лимонада';

function replaceK (&$str) {
    $str = str_replace('К', '', $str);
    return $str;
}

function replaceWorld (&$str2) {
    $str2 = str_replace('Две', 'Три', $str2);
    $str2 = str_replace('Три', 'Четыре', $str2);
    return $str2;
}

echo replaceK($str).'<br />';
echo replaceWorld($str2);

echo '<hr>';
/* TASK 7 */

/* TASK 8 */
$str = 'RX packets:10000000 errors:8956 dropped:4562339 overruns:0 :) frame:0.';
$regPackets = '/\d+/';
$regSmile = '/(:\))/';

if (preg_match($regSmile, $str, $match)) {
    printSmile();
} elseif (preg_match($regPackets, $str, $match)){
    if ((int)$match[0] > 1000) {
        echo 'Сеть есть!';
    }
}

function printSmile(){
    echo '<pre>                         oooo$$$$$$$$$$$$oooo
                      oo$$$$$$$$$$$$$$$$$$$$$$$$o
                   oo$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$o         o$   $$ o$
   o $ oo        o$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$o       $$ $$ $$o$
oo $ $ "$      o$$$$$$$$$    $$$$$$$$$$$$$    $$$$$$$$$o       $$$o$$o$
"$$$$$$o$     o$$$$$$$$$      $$$$$$$$$$$      $$$$$$$$$$o    $$$$$$$$
  $$$$$$$    $$$$$$$$$$$      $$$$$$$$$$$      $$$$$$$$$$$$$$$$$$$$$$$
  $$$$$$$$$$$$$$$$$$$$$$$    $$$$$$$$$$$$$    $$$$$$$$$$$$$$  """$$$
   "$$$""""$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$     "$$$
    $$$   o$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$     "$$$o
   o$$"   $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$       $$$o
   $$$    $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$" "$$$$$$ooooo$$$$o
  o$$$oooo$$$$$  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$   o$$$$$$$$$$$$$$$$$
  $$$$$$$$"$$$$   $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$     $$$$""""""""
 """"       $$$$    "$$$$$$$$$$$$$$$$$$$$$$$$$$$$"      o$$$
            "$$$o     """$$$$$$$$$$$$$$$$$$"$$"         $$$
              $$$o          "$$""$$$$$$""""           o$$$
               $$$$o                                o$$$"
                "$$$$o      o$$$$$$o"$$$$o        o$$$$
                  "$$$$$oo     ""$$$$o$$$$$o   o$$$$""
                     ""$$$$$oooo  "$$$o$$$$$$$$$"""
                        ""$$$$$$$oo $$$$$$$$$$
                                """"$$$$$$$$$$$
                                    $$$$$$$$$$$$
                                     $$$$$$$$$$"
                                      "$$$""""';
}
echo '<hr>';
/* TASK 8 */

/* TASK 9 */
$str = file_get_contents('./test.txt');
echo $str.'<hr>';
/* TASK 9 */

/* TASK 10 */
$file = './anothertest.txt';
fopen($file, 'x+');
file_put_contents($file, 'Hello again!!!');
fclose($file);
/* TASK 10 */
?>