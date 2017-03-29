<?php

/* layout.twig */
class __TwigTemplate_498d94dfe9b7b818f7f39ef404750a80da8cadc88d7fd8d506e1d6e2717930bb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<?php session_start();?>
<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href=\"/5.2/template/css/bootstrap.min.css\" rel=\"stylesheet\">


    <!-- Custom styles for this template -->
    <link href=\"/5.2/template/starter-template.css\" rel=\"stylesheet\">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
      <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
  </head>
  <body>
  <nav class=\"navbar navbar-inverse navbar-fixed-top\">
      <div class=\"container\">
        <div class=\"navbar-header\">
          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
          <a class=\"navbar-brand\" href=\"#\">Project name</a>
        </div>
        <div id=\"navbar\" class=\"collapse navbar-collapse\">
          <ul class=\"nav navbar-nav\">
            <li class=\"active\" ><a href=\"/main\">Авторизация</a></li>
            <li><a href=\"/reg\">Регистрация</a></li>
            <li><a href=\"/list\">Список пользователей</a></li>
            <li><a href=\"/filelist\">Список файлов</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class=\"container\">
      ";
        // line 51
        $this->displayBlock('content', $context, $blocks);
        // line 54
        echo "    </div><!-- /.container -->
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
    <script src=\"/template/js/main.js\"></script>
    <script src=\"/template/js/bootstrap.min.js\"></script>

  </body>
</html>";
    }

    // line 51
    public function block_content($context, array $blocks = array())
    {
        // line 52
        echo "
      ";
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function getDebugInfo()
    {
        return array (  90 => 52,  87 => 51,  74 => 54,  72 => 51,  20 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "layout.twig", "D:\\OpenServer\\domains\\php0217\\05\\5.2\\app\\views\\layout.twig");
    }
}
