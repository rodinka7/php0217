<div class="form-container">
  <form class="form-horizontal" action="registration.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="inputEmail3" placeholder="Логин">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="inputPassword3" placeholder="Пароль">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword4" class="col-sm-2 control-label">Пароль (Повтор)</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="inputPassword4" placeholder="Пароль">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Зарегистрироваться</button>
        <br><br>
        Зарегистрированы? <a href="/03/index.php?content=main">Авторизируйтесь</a>
      </div>
    </div>
  </form>
</div>