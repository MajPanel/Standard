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

/* Admin/MenuAdmin.html.twig */
class __TwigTemplate_7e550a8aabbb00db59d5046a78a786079710db6641a2e0a101783d60de66abef extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Admin/MenuAdmin.html.twig"));

        // line 1
        echo "
<div class=\"l-sidebar__content\">
    <nav class=\"c-menu js-menu\">
        <ul class=\"u-list\">

            <li class=\"c-menu__item \" data-toggle=\"tooltip\" >
                <div class=\"c-menu__item__inner\"><i class=\"fa fa-globe\"></i>
                    <div class=\"c-menu-item__title\">
                        <a href=\"http://www.majpanel.com\" target=\"_blank\"><h1  class=\"text-white\">MajPanel</h1></a>
                    </div>
                </div>
            </li>



            <li class=\"c-menu__item \" data-toggle=\"tooltip\" title=\"Proposals\">
                <div class=\"c-menu__item__inner\"><i class=\"fa fa-file-text-o\"></i>
                    <div class=\"c-menu-item__title\">
                        <a href=\"";
        // line 19
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_majpanel_grid_blog_home");
        echo "\" ><span class=\"text-white\">Blog</span></a>
                    </div>
                </div>
            </li>



            <li class=\"c-menu__item has-submenu\" data-toggle=\"tooltip\" title=\"Settings\">
                <a href=\"#\" data-toggle=\"collapse\" data-target=\"#submenu-2\">
                    <div class=\"c-menu__item__inner\"><i class=\"fa fa-table \"></i>
                        <div class=\"c-menu-item__title\"><span class=\"text-white\">Entity <i class=\"fa fa-fw fa-angle-down pull-right\"></i></span></div>
                    </div></a>
                <ul id=\"submenu-2\" class=\"collapse\" aria-expanded=\"false\" style=\"height: 0px;\">

                    ";
        // line 33
        echo twig_include($this->env, $context, "Admin/Entity.html.twig");
        echo "
                </ul>
            </li>


            <li class=\"c-menu__item has-submenu\" data-toggle=\"tooltip\" title=\"History\">
                <div class=\"c-menu__item__inner\"><i class=\"fa fa-book\"></i>
                    <a href=\"\">
                        <div class=\"c-menu-item__title\">
                            <a href=\"";
        // line 42
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("majpanel_getstart");
        echo "\" >
                                <span class=\"text-white\">Get Start</span>
                            </a>
                    </a>
                </div>
            </li>

            <li class=\"c-menu__item has-submenu\" data-toggle=\"tooltip\" title=\"Settings\">
                <div class=\"c-menu__item__inner\"><i class=\"fa fa-home\"></i>
                    <div class=\"c-menu-item__title\">
                        <a href=\"";
        // line 52
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("blog_home");
        echo "\" target=\"_blank\" >
                            <span class=\"text-white\" >Home Page</span>
                        </a>
                    </div>
                </div>
            </li>




        </ul>
    </nav>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "Admin/MenuAdmin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 52,  89 => 42,  77 => 33,  60 => 19,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
<div class=\"l-sidebar__content\">
    <nav class=\"c-menu js-menu\">
        <ul class=\"u-list\">

            <li class=\"c-menu__item \" data-toggle=\"tooltip\" >
                <div class=\"c-menu__item__inner\"><i class=\"fa fa-globe\"></i>
                    <div class=\"c-menu-item__title\">
                        <a href=\"http://www.majpanel.com\" target=\"_blank\"><h1  class=\"text-white\">MajPanel</h1></a>
                    </div>
                </div>
            </li>



            <li class=\"c-menu__item \" data-toggle=\"tooltip\" title=\"Proposals\">
                <div class=\"c-menu__item__inner\"><i class=\"fa fa-file-text-o\"></i>
                    <div class=\"c-menu-item__title\">
                        <a href=\"{{ path('admin_majpanel_grid_blog_home') }}\" ><span class=\"text-white\">Blog</span></a>
                    </div>
                </div>
            </li>



            <li class=\"c-menu__item has-submenu\" data-toggle=\"tooltip\" title=\"Settings\">
                <a href=\"#\" data-toggle=\"collapse\" data-target=\"#submenu-2\">
                    <div class=\"c-menu__item__inner\"><i class=\"fa fa-table \"></i>
                        <div class=\"c-menu-item__title\"><span class=\"text-white\">Entity <i class=\"fa fa-fw fa-angle-down pull-right\"></i></span></div>
                    </div></a>
                <ul id=\"submenu-2\" class=\"collapse\" aria-expanded=\"false\" style=\"height: 0px;\">

                    {{ include('Admin/Entity.html.twig') }}
                </ul>
            </li>


            <li class=\"c-menu__item has-submenu\" data-toggle=\"tooltip\" title=\"History\">
                <div class=\"c-menu__item__inner\"><i class=\"fa fa-book\"></i>
                    <a href=\"\">
                        <div class=\"c-menu-item__title\">
                            <a href=\"{{ path('majpanel_getstart') }}\" >
                                <span class=\"text-white\">Get Start</span>
                            </a>
                    </a>
                </div>
            </li>

            <li class=\"c-menu__item has-submenu\" data-toggle=\"tooltip\" title=\"Settings\">
                <div class=\"c-menu__item__inner\"><i class=\"fa fa-home\"></i>
                    <div class=\"c-menu-item__title\">
                        <a href=\"{{ path('blog_home') }}\" target=\"_blank\" >
                            <span class=\"text-white\" >Home Page</span>
                        </a>
                    </div>
                </div>
            </li>




        </ul>
    </nav>
</div>
", "Admin/MenuAdmin.html.twig", "/media/majid/Local Disk1/majpanel/majpanelstandard/templates/Admin/MenuAdmin.html.twig");
    }
}
