<?php
require_once('config.php');

$newCategory = new Category(); 

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $goods = Good::all();
    echo $goods->toJson();

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents('php://input');
    
    $obj = json_decode($data, true);

    $good = Good::find($_GET['id']);

    if ($good) {

        $good->name = $obj['name'];
        $good->art = $obj['art'];
        $good->producer = $obj['producer'];
        $good->count = $obj['count'];
        $good->price = $obj['price'];

        $category = Category::where('name', $obj['category'])->first();

        if ($category) {
            $good->category_id = $category->id;
        }

        if ($good->save() == 1) {
            echo 'Данные успешно обновлены!';
        }
    } else {
        $good = new Good();
        
        $good->name = $obj['name'];
        $good->art = $obj['art'];
        $good->producer = $obj['producer'];
        $good->count = $obj['count'];
        $good->price = $obj['price'];
        
        $category = Category::where('name', $obj['category'])->first();

        if ($category) {
            $good->category_id = $category->id;
        }
        
        if ($good->save() == 1) {
            echo 'Данные успешно сохранены в базу данных!';
        }
    } 
}
?>