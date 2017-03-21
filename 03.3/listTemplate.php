<?php require_once('config.php');?>
<h1>Запретная зона, доступ только авторизированному пользователю</h1>
<h2>Информация выводится из базы данных</h2>
<form action="list.php" method="POST" enctype="multipart/form-data">
  <table class="table table-bordered">
    <tr>
      <th>Пользователь(логин)</th>
      <th>Имя</th>
      <th>возраст</th>
      <th>описание</th>
      <th>Фотография</th>
    </tr>
    <tr>
      <td><input type="text" class="form-control" placeholder="Логин" name="login"></td>
      <td><input type="text" class="form-control" placeholder="Имя" name="name"></td>
      <td><input type="text" class="form-control" placeholder="дата-месяц-год рождения" name="date"></td>
      <td><input type="text" class="form-control" placeholder="Описание" name="desc"></td>
      <td><input type="file" class="form-control" placeholder="Загрузить фото" name="file"></td>
    </tr>
  </table>
  <button type="submit" class="btn btn-default">Добавить пользователя</button>
</form>
<form enctype="multipart/form-data" style="margin-top: 20px;">
  <table class="table table-bordered">
    <tr>
    <th>Пользователь(логин)</th>
    <th>Имя</th>
    <th>возраст</th>
    <th>описание</th>
    <th>Фотография</th>
    </tr>
    <?php 
      $sql = 'SELECT * FROM `users` ';
      $result = $connection->query($sql);
      $users = $result->fetch_all(MYSQLI_ASSOC);

      foreach ($users as $user) {
        $files = scandir('./img/');
        foreach ($files as $file) {
          if ($file == )
        }
        echo '<tr>';
        echo '<td>'.$user['login'].'</td>';
        echo '<td>'.$user['name'].'</td>';
        echo '<td>'.$user['age'].'</td>';
        echo '<td>'.$user['description'].'</td>';
        echo '<td>'.scandir('./img/').'</td>';
        echo '</tr>';  
      }
    ?>
  </table>
</form>