<?php
require_once('config.php');

$good = new Good();
$newCategory = new Category();

$good->name = $_POST['name'];
$good->art = $_POST['art'];
$good->producer = $_POST['producer'];
$good->count = $_POST['count'];
$good->price = $_POST['price'];
$good->category = $_POST['category'];
$good->save();

$goods = Good::all();
$categories = Category::all();

$result = findCategory($categories);

function findCategory($categories) {
	foreach ($categories as $category) {
		if ($_POST['category'] == $category['category']) {
			return true;
		}
	}
}

if (!$result) {
	$newCategory->category = $_POST['category'];
	$newCategory->save();
}
?>

<h2><a href="index.php">На главную</a></h2>

<table>
    <tr>
        <th>ID товара</th>
        <th>Наименование товара</th>
        <th>Артикул</th>
        <th>Производитель</th>
        <th>Количество, шт</th>
        <th>Стоимость, $</th>
        <th>Категория</th>
    </tr>
    <?php    foreach($goods as $good) :    ?>
        <tr>
            <td><a href="show.php?id=<?= $good->id; ?>"><?=$good->id?></a></td>
            <td><a href="show.php?id=<?= $good->id; ?>"><?=$good->name?></a></td>
            <td><a href="show.php?id=<?= $good->id; ?>"><?=$good->art?></a></td>
            <td><a href="show.php?id=<?= $good->id; ?>"><?=$good->producer?></a></td>
			<td><a href="show.php?id=<?= $good->id; ?>"><?=$good->count?></a></td>
			<td><a href="show.php?id=<?= $good->id; ?>"><?=$good->price?></a></td>
			<td><a href="show.php?id=<?= $good->id; ?>"><?=$good->category?></a></td>
        </tr>
    <?php endforeach; ?>
</table>