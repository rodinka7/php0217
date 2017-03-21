<div class="form-container">
  <form class="form-horizontal" action="login.php" method="POST" enctype="multipart/form-data">
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
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Войти</button>
        <br><br>
        Нет аккаунта? <a href="/03/index.php?content=reg">Зарегистрируйтесь</a>
      </div>
    </div>
  </form>
</div>