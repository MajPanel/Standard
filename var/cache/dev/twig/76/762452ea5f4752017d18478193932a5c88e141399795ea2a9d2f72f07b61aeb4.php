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

/* Blog/Blog_home/index.html.twig */
class __TwigTemplate_cb677324ddd3dfa9816bf306f58814756b7e6909c3e43f39e097c906be007b6c extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'menu' => [$this, 'block_menu'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Blog/Blog_home/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "Blog/Blog_home/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Home Blog MAjPanel!";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "     ";
        echo twig_include($this->env, $context, "Menu.html.twig", ["backgroundColor" => "violet"]);
        echo "
 ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 10
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 11
        echo "
    <div class=\"container\">

        <div class=\"row\">
            <div class=\"col-md-8 mb-5\">

                ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["dataget_all"]) || array_key_exists("dataget_all", $context) ? $context["dataget_all"] : (function () { throw new RuntimeError('Variable "dataget_all" does not exist.', 17, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 18
            echo "                <div class=\"row\" >

                <h2>";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "header", [], "any", false, false, false, 20), "html", null, true);
            echo "</h2>
                <hr>

                    ";
            // line 23
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "content", [], "any", false, false, false, 23)) < 100)) {
                // line 24
                echo "
                        ";
                // line 25
                echo twig_get_attribute($this->env, $this->source, $context["value"], "content", [], "any", false, false, false, 25);
                echo "

                    ";
            } else {
                // line 28
                echo "
                        ";
                // line 29
                echo strip_tags(twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "content", [], "any", false, false, false, 29), 0, 500), "&nbsp;&gt;");
                echo "

                        <a href=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("blog_show", ["id" => twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 31)]), "html", null, true);
                echo "\" class=\"btn btn-primary btn-sm\">continue</a>
                    ";
            }
            // line 33
            echo "                    <hr>
               </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "
            </div>

            <div class=\"col-md-4 mb-5\">

                <h2>Contact Us</h2>
                <hr>
                <address>
                    <strong>Start Bootstrap</strong>
                    <br>3481 Melrose Place
                    <br>Beverly Hills, CA 90210
                    <br>
                </address>
                <address>
                    <abbr title=\"Phone\">P:</abbr>
                    (123) 456-7890
                    <br>
                    <abbr title=\"Email\">E:</abbr>
                    <a href=\"mailto:#\">name@example.com</a>
                </address>
            </div>
        </div>
        <!-- /.row -->




    </div>
        <!-- /.row -->
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "Blog/Blog_home/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 36,  137 => 33,  132 => 31,  127 => 29,  124 => 28,  118 => 25,  115 => 24,  113 => 23,  107 => 20,  103 => 18,  99 => 17,  91 => 11,  84 => 10,  74 => 6,  67 => 5,  54 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Home Blog MAjPanel!{% endblock %}

{% block menu %}
     {{ include('Menu.html.twig', { 'backgroundColor': 'violet' }) }}
 {% endblock  %}


{% block body %}

    <div class=\"container\">

        <div class=\"row\">
            <div class=\"col-md-8 mb-5\">

                {% for  value in dataget_all %}
                <div class=\"row\" >

                <h2>{{ value.header }}</h2>
                <hr>

                    {% if  value.content |length <100  %}

                        {{ value.content|raw  }}

                    {% else %}

                        {{ value.content[:500]|striptags(\"&nbsp;&gt;\")|raw }}

                        <a href=\"{{ path('blog_show', {id: value.id }) }}\" class=\"btn btn-primary btn-sm\">continue</a>
                    {% endif %}
                    <hr>
               </div>
                {% endfor %}

            </div>

            <div class=\"col-md-4 mb-5\">

                <h2>Contact Us</h2>
                <hr>
                <address>
                    <strong>Start Bootstrap</strong>
                    <br>3481 Melrose Place
                    <br>Beverly Hills, CA 90210
                    <br>
                </address>
                <address>
                    <abbr title=\"Phone\">P:</abbr>
                    (123) 456-7890
                    <br>
                    <abbr title=\"Email\">E:</abbr>
                    <a href=\"mailto:#\">name@example.com</a>
                </address>
            </div>
        </div>
        <!-- /.row -->




    </div>
        <!-- /.row -->
{% endblock %}
", "Blog/Blog_home/index.html.twig", "/media/majid/Local Disk1/majpanel/majpanelstandard/templates/Blog/Blog_home/index.html.twig");
    }
}
