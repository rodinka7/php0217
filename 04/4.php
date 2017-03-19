<?php
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_POST, true);
$out = curl_exec($curl);

$arr = json_decode($out, true);

curl_close($curl);

function findData($arr) {
	foreach ($arr as $key => $value) {
		if (($key == 'pageid') || ($key == 'title')) {
			echo $key.' => '.$value.'<br />';
		} else {
			if (is_array($value)) {
				findData($value);
			}
		}
	}
}

findData($arr);
?>