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

/* post/index.html.twig */
class __TwigTemplate_0f1c5de674ac00127f898bdc168a646c3a788a9694511aa0dd1773e1b144c5e5 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "post/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Post index";
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <div class=\"container col-md-5 m-auto\">
        ";
        // line 7
        if (($context["homepage"] ?? null)) {
            // line 8
            echo "            <h1>Notícias em destaque</h1>
        ";
        } else {
            // line 10
            echo "            <h1>Todas as notícias</h1>
        ";
        }
        // line 12
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 13
            echo "            <div class=\"card text-center\">
                <div class=\"card-header\">
                    <h2>";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 15), "html", null, true);
            echo "</h2>
                </div>
                <div class=\"card-body\">
                    <img src=\"";
            // line 18
            echo twig_escape_filter($this->env, ("/uploads/" . twig_get_attribute($this->env, $this->source, $context["post"], "image", [], "any", false, false, false, 18)), "html", null, true);
            echo "\" alt=\"\">
                    <h5>";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "resume", [], "any", false, false, false, 19), "html", null, true);
            echo "</h5>
                    <a class=\"btn btn-primary\" href=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("post_show", ["id" => twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 20)]), "html", null, true);
            echo "\">Saiba mais</a>
                </div>
                <div class=\"card-footer text-muted\">
                    <p>Data: ";
            // line 23
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "date", [], "any", false, false, false, 23), "d/m/y"), "html", null, true);
            echo "</p>
                </div>
            </div>      
            <br>
            <br>
            
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "
        ";
        // line 31
        if (($context["homepage"] ?? null)) {
            // line 32
            echo "            <a class=\"btn btn-primary\" href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("post_index");
            echo "\">Veja mais noticias</a>
        ";
        } else {
            // line 34
            echo "            <a class=\"btn btn-primary\" href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
            echo "\">Voltar</a>
        ";
        }
        // line 36
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "post/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 36,  124 => 34,  118 => 32,  116 => 31,  113 => 30,  100 => 23,  94 => 20,  90 => 19,  86 => 18,  80 => 15,  76 => 13,  71 => 12,  67 => 10,  63 => 8,  61 => 7,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "post/index.html.twig", "/home/marcelonassar/lampstack-7.3.13-0/apache2/htdocs/internit/templates/post/index.html.twig");
    }
}
