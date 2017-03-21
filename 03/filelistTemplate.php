<?php require_once('config.php');?>
<h1>Запретная зона, доступ только авторизированному пользователю</h1>
<h2>Информация выводится из списка файлов</h2>
<table class="table table-bordered">
  <tr>
    <th>Название файла</th>
    <th>Фотография</th>
    <th>Действия</th>
  </tr>
  <?php 
    $files = scandir('./img/');
    
    function getExtension($filename) {
      return end(explode(".", $filename));
    }

    foreach ($files as $file) {
      if ((getExtension($file) == 'jpg') 
      || (getExtension($file) == 'png') 
      || (getExtension($file) == 'gif')) {
        echo '<tr>';
        echo '<td>'.$file.'</td>';
        echo '<td><img src="./img/'.$file.'" style="width: 200px;" alt=""></td>';
        echo '<td><a href="deleteImg.php?img='.$file.'">Удалить аватарку пользователя</a></td>';
        echo '</tr>';   
      }    
    }
  ?>
</table>