<?php

/* main_view.twig */
class __TwigTemplate_f9114fae7dfd0cf5686828613f0fe8f67eeceb95bfb61e4fd8b9abc740dde559 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "main_view.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"form-container\">
\t  <form class=\"form-horizontal\" action=\"login.php\" method=\"POST\" enctype=\"multipart/form-data\">
\t    <div class=\"form-group\">
\t      <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">Логин</label>
\t      <div class=\"col-sm-10\">
\t        <input type=\"text\" class=\"form-control\" name=\"inputEmail3\" placeholder=\"Логин\">
\t      </div>
\t    </div>
\t    <div class=\"form-group\">
\t      <label for=\"inputPassword3\" class=\"col-sm-2 control-label\">Пароль</label>
\t      <div class=\"col-sm-10\">
\t        <input type=\"password\" class=\"form-control\" name=\"inputPassword3\" placeholder=\"Пароль\">
\t      </div>
\t    </div>
\t    <div class=\"form-group\">
\t      <div class=\"col-sm-offset-2 col-sm-10\">
\t        <button type=\"submit\" class=\"btn btn-default\">Войти</button>
\t        <br><br>
\t        Нет аккаунта? <a href=\"/03/index.php?content=reg\">Зарегистрируйтесь</a>
\t      </div>
\t    </div>
\t  </form>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "main_view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "main_view.twig", "D:\\OpenServer\\domains\\php0217\\05\\5.2\\app\\views\\main_view.twig");
    }
}
