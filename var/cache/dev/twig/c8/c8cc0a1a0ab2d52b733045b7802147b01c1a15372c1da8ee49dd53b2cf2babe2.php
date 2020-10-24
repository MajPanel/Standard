<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html.admin.twig */
class __TwigTemplate_724c31304d1d85c8b27ce078dfaa383b2e8e365fd0f8adbd80a0e61703174d19 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'entityName' => [$this, 'block_entityName'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.admin.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"icon\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\">

    ";
        // line 11
        $this->displayBlock('title', $context, $blocks);
        // line 12
        echo "    ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 31
        echo "
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>

<body>

<div class=\"main-container\">
    <div class=\"main-container\">

        <header class=\"l-header\">
            <div class=\"l-header__inner clearfix\">
                <div class=\"c-header-icon js-hamburger\">
                    <div class=\"hamburger-toggle\"><span class=\"bar-top\"></span><span class=\"bar-mid\"></span><span
                                class=\"bar-bot\"></span></div>
                </div>

                <div class=\"c-titel col-lg-2\">
                    <h1>  ";
        // line 52
        $this->displayBlock('entityName', $context, $blocks);
        echo " </h1>
                </div>
                <div class=\"header-icons-group\">
                    <a href=\"";
        // line 55
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        echo "\">
                        <div class=\"c-header-icon logout\"><i class=\"fa fa-power-off\"></i></div>
                    </a>
                </div>
            </div>
        </header>

        <div class=\"l-sidebar\">
            ";
        // line 63
        echo twig_include($this->env, $context, "Admin/MenuAdmin.html.twig");
        echo "
        </div>

        <div id=\"react-container\">
            ";
        // line 67
        ob_start();
        // line 68
        echo "                ";
        $this->displayBlock('body', $context, $blocks);
        // line 69
        echo "            ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 70
        echo "        </div>
    </div>

</div><!-- /.container -->


";
        // line 76
        $this->displayBlock('javascripts', $context, $blocks);
        // line 80
        echo "
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://use.fontawesome.com/2188c74ac9.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/admin.js"), "html", null, true);
        echo "\"></script>

</body>
</html>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 11
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "<title>MajPanel</title>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 12
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 13
        echo "        ";
        // line 14
        echo "
        <meta charset=\"UTF-8\">
        <title>MajPanel Admin</title>

        <link rel='stylesheet prefetch'
              href=' https://cdnjs.cloudflare.com/ajax/libs/react-datepicker/3.1.3/react-datepicker.css'>
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
        <link rel='stylesheet prefetch' href='";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "'>
        <link rel='stylesheet prefetch' href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/custom.css"), "html", null, true);
        echo "\">
        <link rel='stylesheet prefetch'  href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/suneditor.min.css"), "html", null, true);
        echo "\" >
        <link rel='stylesheet prefetch'  href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/animate.min.css"), "html", null, true);
        echo "\" >

        <style class=\"cp-pen-styles\">
            @import url(\"https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700&subset=latin-ext\");
        </style>

    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 52
    public function block_entityName($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "entityName"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 68
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 76
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 77
        echo "    ";
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("app");
        echo "

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "base.html.admin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  237 => 77,  230 => 76,  218 => 68,  206 => 52,  192 => 24,  188 => 23,  184 => 22,  180 => 21,  171 => 14,  169 => 13,  162 => 12,  149 => 11,  137 => 85,  130 => 80,  128 => 76,  120 => 70,  117 => 69,  114 => 68,  112 => 67,  105 => 63,  94 => 55,  88 => 52,  65 => 31,  62 => 12,  60 => 11,  55 => 9,  45 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"icon\" href=\"{{ asset('favicon.ico') }}\">

    {% block title %}<title>MajPanel</title>{% endblock title %}
    {% block stylesheets %}
        {#       {{ encore_entry_link_tags('app') }}#}

        <meta charset=\"UTF-8\">
        <title>MajPanel Admin</title>

        <link rel='stylesheet prefetch'
              href=' https://cdnjs.cloudflare.com/ajax/libs/react-datepicker/3.1.3/react-datepicker.css'>
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
        <link rel='stylesheet prefetch' href='{{ asset(\"css/bootstrap.min.css\") }}'>
        <link rel='stylesheet prefetch' href=\"{{ asset(\"css/custom.css\") }}\">
        <link rel='stylesheet prefetch'  href=\"{{ asset(\"css/suneditor.min.css\") }}\" >
        <link rel='stylesheet prefetch'  href=\"{{ asset(\"css/animate.min.css\") }}\" >

        <style class=\"cp-pen-styles\">
            @import url(\"https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700&subset=latin-ext\");
        </style>

    {% endblock %}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>

<body>

<div class=\"main-container\">
    <div class=\"main-container\">

        <header class=\"l-header\">
            <div class=\"l-header__inner clearfix\">
                <div class=\"c-header-icon js-hamburger\">
                    <div class=\"hamburger-toggle\"><span class=\"bar-top\"></span><span class=\"bar-mid\"></span><span
                                class=\"bar-bot\"></span></div>
                </div>

                <div class=\"c-titel col-lg-2\">
                    <h1>  {% block entityName %}{% endblock %} </h1>
                </div>
                <div class=\"header-icons-group\">
                    <a href=\"{{ path('app_logout') }}\">
                        <div class=\"c-header-icon logout\"><i class=\"fa fa-power-off\"></i></div>
                    </a>
                </div>
            </div>
        </header>

        <div class=\"l-sidebar\">
            {{ include('Admin/MenuAdmin.html.twig') }}
        </div>

        <div id=\"react-container\">
            {% spaceless %}
                {% block body %}{% endblock %}
            {% endspaceless %}
        </div>
    </div>

</div><!-- /.container -->


{% block javascripts %}
    {{ encore_entry_script_tags('app') }}

{% endblock %}

<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://use.fontawesome.com/2188c74ac9.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src=\"{{ asset(\"js/admin.js\") }}\"></script>

</body>
</html>
", "base.html.admin.twig", "/media/majid/Local Disk1/majpanel/majpanelstandard/templates/base.html.admin.twig");
    }
}
