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

/* tarea/listado.html.twig */
class __TwigTemplate_811e7c14f3df45af902f7ab18fb404a9 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "tarea/listado.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "tarea/listado.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "tarea/listado.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Tareas por hacer!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <h1>Tareas por hacer</h1>
    ";
        // line 7
        $this->loadTemplate("comunes/_mensajes.html.twig", "tarea/listado.html.twig", 7)->display($context);
        // line 8
        echo "    <table class=\"table table-striped\">
        <thead>
            <tr>
                <th scope=\"col\">#</th>
                <th scope=\"col\">Descripcion</th>
                <th scope=\"col\">Acciones</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tareas"]) || array_key_exists("tareas", $context) ? $context["tareas"] : (function () { throw new RuntimeError('Variable "tareas" does not exist.', 17, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["index"] => $context["tarea"]) {
            // line 18
            echo "                <tr>
                    <th scope=\"row\">";
            // line 19
            echo twig_escape_filter($this->env, ($context["index"] + 1), "html", null, true);
            echo "</th>
                    <td>";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tarea"], "Descripcion", [], "any", false, false, false, 20), "html", null, true);
            echo "</td>
                    <td>
                        <a href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_editar_tarea", ["id" => twig_get_attribute($this->env, $this->source, $context["tarea"], "id", [], "any", false, false, false, 22)]), "html", null, true);
            echo "\">editar</a>
                        <a href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_eliminar_tarea", ["id" => twig_get_attribute($this->env, $this->source, $context["tarea"], "id", [], "any", false, false, false, 23)]), "html", null, true);
            echo "\">eliminar</a>
                    </td>
                </tr>
            ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 27
            echo "                <tr>
                    <th colspan=\"3\" scope=\"row\">No se han encontrado resultados</th>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['tarea'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "        </tbody>
    </table>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "tarea/listado.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 31,  134 => 27,  125 => 23,  121 => 22,  116 => 20,  112 => 19,  109 => 18,  104 => 17,  93 => 8,  91 => 7,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Tareas por hacer!{% endblock %}

{% block body %}
    <h1>Tareas por hacer</h1>
    {% include('comunes/_mensajes.html.twig') %}
    <table class=\"table table-striped\">
        <thead>
            <tr>
                <th scope=\"col\">#</th>
                <th scope=\"col\">Descripcion</th>
                <th scope=\"col\">Acciones</th>
            </tr>
        </thead>
        <tbody>
            {% for index, tarea in tareas %}
                <tr>
                    <th scope=\"row\">{{ index + 1}}</th>
                    <td>{{ tarea.Descripcion }}</td>
                    <td>
                        <a href=\"{{ path('app_editar_tarea', {'id': tarea.id}) }}\">editar</a>
                        <a href=\"{{ path('app_eliminar_tarea', {'id': tarea.id}) }}\">eliminar</a>
                    </td>
                </tr>
            {% else %}
                <tr>
                    <th colspan=\"3\" scope=\"row\">No se han encontrado resultados</th>
                </tr>
            {% endfor %}
        </tbody>
    </table>
{% endblock %}", "tarea/listado.html.twig", "D:\\github\\symfony\\curso_principiante\\templates\\tarea\\listado.html.twig");
    }
}
