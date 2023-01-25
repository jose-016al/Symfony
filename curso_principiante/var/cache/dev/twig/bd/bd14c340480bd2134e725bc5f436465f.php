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

/* tarea/_formulario.html.twig */
class __TwigTemplate_8469e14cd3905d68135d81882cb5eff0 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "tarea/_formulario.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "tarea/_formulario.html.twig"));

        // line 1
        echo "<form method=\"POST\" action=\"";
        echo twig_escape_filter($this->env, (isset($context["accion"]) || array_key_exists("accion", $context) ? $context["accion"] : (function () { throw new RuntimeError('Variable "accion" does not exist.', 1, $this->source); })()), "html", null, true);
        echo "\">
    <div>
        <label for=\"descripcion\">Descripcion</label>
        <input type=\"text\" class=\"form-control\" id=\"descripcion\" name=\"descripcion\" aria-describedby=\"descripcion\" placesholder=\"Descripcion\" value=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["tarea"]) || array_key_exists("tarea", $context) ? $context["tarea"] : (function () { throw new RuntimeError('Variable "tarea" does not exist.', 4, $this->source); })()), "descripcion", [], "any", false, false, false, 4), "html", null, true);
        echo "\">
        <small id=\"descripcionAyuda\" class=\"form-text text-muted\">Descripcion de la tarea a relalizar</small>
    </div>

    <button type=\"submit\" class=\"btn btn-primary\">";
        // line 8
        echo twig_escape_filter($this->env, ((array_key_exists("etiqueta_btn_enviar", $context)) ? (_twig_default_filter((isset($context["etiqueta_btn_enviar"]) || array_key_exists("etiqueta_btn_enviar", $context) ? $context["etiqueta_btn_enviar"] : (function () { throw new RuntimeError('Variable "etiqueta_btn_enviar" does not exist.', 8, $this->source); })()), "Guardar")) : ("Guardar")), "html", null, true);
        echo "</button>
</form>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "tarea/_formulario.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 8,  50 => 4,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form method=\"POST\" action=\"{{ accion}}\">
    <div>
        <label for=\"descripcion\">Descripcion</label>
        <input type=\"text\" class=\"form-control\" id=\"descripcion\" name=\"descripcion\" aria-describedby=\"descripcion\" placesholder=\"Descripcion\" value=\"{{ tarea.descripcion }}\">
        <small id=\"descripcionAyuda\" class=\"form-text text-muted\">Descripcion de la tarea a relalizar</small>
    </div>

    <button type=\"submit\" class=\"btn btn-primary\">{{ etiqueta_btn_enviar|default('Guardar') }}</button>
</form>", "tarea/_formulario.html.twig", "D:\\github\\symfony\\curso_principiante\\templates\\tarea\\_formulario.html.twig");
    }
}
