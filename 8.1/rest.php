<?php
require_once('config.php');

$good = new Good();
$newCategory = new Category(); 

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $goods = Good::all();
    echo $goods;
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents('php://input');
    
    $obj = json_decode($data);
    
    $good->name = $obj['name'];
    $good->art = $obj['art'];
    $good->producer = $obj['producer'];
    $good->count = $obj['count'];
    $good->price = $obj['price'];
    $good->category = $obj['category'];
    $good->save();

    $goods = Good::all();
    $categories = Category::all();

    $result = findCategory($categories, $obj);

    if (!$result) {
        $newCategory->category = $obj['category'];
        $newCategory->save();
    }
}

function findCategory($categories, $obj) {
	foreach ($categories as $category) {
		if ($obj['category'] == $category['category']) {
			return true;
		}
	}
}
?>