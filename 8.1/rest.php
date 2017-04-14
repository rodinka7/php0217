<?php
require_once('config.php');

$newCategory = new Category(); 

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $goods = Good::all();
    echo $goods;
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents('php://input');
    
    $obj = json_decode($data, true);

    $good = Good::where('name', $obj['name'])->first();

    if ($good) {

        $goodToChange = Good::find($good['id']);

        $goodToChange->name = $obj['name'];
        $goodToChange->art = $obj['art'];
        $goodToChange->producer = $obj['producer'];
        $goodToChange->count = $obj['count'];
        $goodToChange->price = $obj['price'];
        $goodToChange->category = $obj['category'];

        if ($goodToChange->save() == 1) {
            echo 'Данные успешно обновлены!';
        }

        $goods = Good::all();
        $categories = Category::all();

        $result = findCategory($categories, $obj);

        if (!$result) {
            $newCategory->category = $obj['category'];
            $newCategory->save();
        }
    } else {
        $good = new Good();
        
        $good->name = $obj['name'];
        $good->art = $obj['art'];
        $good->producer = $obj['producer'];
        $good->count = $obj['count'];
        $good->price = $obj['price'];
        $good->category = $obj['category'];
        
        if ($good->save() == 1) {
            echo 'Данные успешно сохранены в базу данных!';
        }

        $goods = Good::all();
        $categories = Category::all();

        $result = findCategory($categories, $obj);

        if (!$result) {
            $newCategory->category = $obj['category'];
            $newCategory->save();
        }
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