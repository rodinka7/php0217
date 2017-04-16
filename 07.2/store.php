<?php
require_once('config.php');

$good = new Good();

$good->name = $_POST['name'];
$good->art = $_POST['art'];
$good->producer = $_POST['producer'];
$good->count = $_POST['count'];
$good->price = $_POST['price'];

$category = Category::where('name', $_POST['category'])->first();

if ($category) {
    $good->category_id = $category->id;
}
$good->save();

$goods = Good::all();
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
			<td><a href="show.php?id=<?= $good->id; ?>"><?=$good->category->name?></a></td>
        </tr>
    <?php endforeach; ?>
</table>