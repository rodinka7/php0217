<?php require_once 'header.php';?>
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active" <?php ($_SERVER['REQUEST_URI'] == '/03.3/index.php?content=main' ? 'class="active"' : ""); ?>><a href="/03.3/index.php?content=main">Авторизация</a></li>
            <li <?php ($_SERVER['REQUEST_URI'] == '/03.3/index.php?content=reg' ? 'class="active"' : ""); ?>><a href="/03.3/index.php?content=reg">Регистрация</a></li>
            <li <?php ($_SERVER['REQUEST_URI'] == '/03.3/index.php?content=list' ? 'class="active"' : ""); ?>><a href="/03.3/index.php?content=list">Список пользователей</a></li>
            <li <?php ($_SERVER['REQUEST_URI'] == '/03.3/index.php?content=filelist' ? 'class="active"' : ""); ?>><a href="/03.3/index.php?content=filelist">Список файлов</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <?php require_once $_GET['content'].'Template.php';?>
    </div><!-- /.container -->
<?php require_once 'footer.php'?>