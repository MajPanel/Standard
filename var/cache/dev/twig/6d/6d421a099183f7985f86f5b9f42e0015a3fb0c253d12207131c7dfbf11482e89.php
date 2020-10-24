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

/* Admin/Entity.html.twig */
class __TwigTemplate_70106bbff0f867a22e6dfcc19501b7c5c2506ec333e1ecdd6259480c6c56fccf extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Admin/Entity.html.twig"));

        // line 1
        echo "
\t\t\t";
        // line 3
        echo "\t\t\t<a href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_majpanel_grid_book_home");
        echo "\">";
        // line 4
        echo "\t\t\t    <div class=\"c-menu-item__title\">";
        // line 5
        echo "\t\t\t        <span><i class=\"fa fa-angle-right \">";
        // line 6
        echo "\t\t\t            </i> Book </span>";
        // line 7
        echo "\t\t\t    </div>";
        // line 8
        echo "\t\t\t</a>";
        // line 9
        echo "




\t\t\t

\t\t\t

\t\t\t

\t\t\t
\t\t\t";
        // line 22
        echo "\t\t\t<a href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_majpanel_grid_autor_home");
        echo "\">";
        // line 23
        echo "\t\t\t    <div class=\"c-menu-item__title\">";
        // line 24
        echo "\t\t\t        <span><i class=\"fa fa-angle-right \">";
        // line 25
        echo "\t\t\t            </i> Autor </span>";
        // line 26
        echo "\t\t\t    </div>";
        // line 27
        echo "\t\t\t</a>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "Admin/Entity.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 27,  81 => 26,  79 => 25,  77 => 24,  75 => 23,  71 => 22,  57 => 9,  55 => 8,  53 => 7,  51 => 6,  49 => 5,  47 => 4,  43 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
\t\t\t{#Book#}
\t\t\t<a href=\"{{ path('admin_majpanel_grid_book_home') }}\">{#Book#}
\t\t\t    <div class=\"c-menu-item__title\">{#Book#}
\t\t\t        <span><i class=\"fa fa-angle-right \">{#Book#}
\t\t\t            </i> Book </span>{#Book#}
\t\t\t    </div>{#Book#}
\t\t\t</a>{#Book#}





\t\t\t

\t\t\t

\t\t\t

\t\t\t
\t\t\t{#Autor#}
\t\t\t<a href=\"{{ path('admin_majpanel_grid_autor_home') }}\">{#Autor#}
\t\t\t    <div class=\"c-menu-item__title\">{#Autor#}
\t\t\t        <span><i class=\"fa fa-angle-right \">{#Autor#}
\t\t\t            </i> Autor </span>{#Autor#}
\t\t\t    </div>{#Autor#}
\t\t\t</a>{#Autor#}", "Admin/Entity.html.twig", "/media/majid/Local Disk1/majpanel/majpanelstandard/templates/Admin/Entity.html.twig");
    }
}
