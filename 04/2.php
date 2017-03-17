<?php
$arr = [			
			[
				"name" => "Jack",
				"age" => 28,
				"occupation" => "web developper",
				"family" => [
					"wife" => "Marry",
					"child" => "Dan"
				],
				"interests" => ['football', 'tennis', 'travelling']
			],
			[
				"name" => "Alex",
				"age" => 30,
				"occupation" => "web designer",
				"family" => [
					"wife" => "Kate",
					"child" => "Liza"
				],
				"interests" => ['boxing', 'tennis', 'travelling']
			]
		];

$json = json_encode($arr);

file_put_contents('output.json', $json);

$json2 = file_get_contents('output2.json');

$arr2 = json_decode($json2, true);

function printDiff($a, $b, $value) {
	echo $value.' => '.$a.'<br />';
	echo $value.' => '.$b.'<br />';
}

function compare ($a, $b) {
	foreach ($a as $value) {
		foreach ($b as $value2) {
			if ($value['name'] != $value2['name']) {
				printDiff($value['name'], $value2['name'], 'name');
			}
			if ($value['age'] != $value2['age']) {
				printDiff($value['age'], $value2['age'], 'age');
			}
			if ($value['occupation'] != $value2['occupation']) {
				printDiff($value['occupation'], $value2['occupation'], 'occupation');
			}
			if (is_array($value['family'])) {
				echo '<pre>';
				print_r(array_diff($value['family'], $value2['family']));
			}
			if (is_array($value['interests'])) {
				echo '<pre>';
				print_r(array_diff($value['interests'], $value2['interests']));
			}
		}
	}
}

compare($arr, $arr2);

?>