<?php

use MailPoetVendor\Twig\Environment;
use MailPoetVendor\Twig\Error\LoaderError;
use MailPoetVendor\Twig\Error\RuntimeError;
use MailPoetVendor\Twig\Extension\SandboxExtension;
use MailPoetVendor\Twig\Markup;
use MailPoetVendor\Twig\Sandbox\SecurityError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedTagError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFilterError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFunctionError;
use MailPoetVendor\Twig\Source;
use MailPoetVendor\Twig\Template;

/* newsletter/templates/blocks/social/settingsStyles.hbs */
class __TwigTemplate_fcbca5a9028fb4f953d56898733c84cc219b74e8452f657bf54ed3cba2ce9563 extends \MailPoetVendor\Twig\Template
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
        // line 1
        echo "{{#each availableSets}}
    <div class=\"mailpoet_social_icon_set{{#ifCond ../activeSet '==' this }} mailpoet_active_icon_set{{/ifCond}}\" data-setName=\"{{ this }}\">
    {{#each ../availableSocialIcons}}<img src=\"{{lookup (lookup ../../socialIconSets ../this) this}}\" />{{/each}}
    </div>
{{/each}}
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/social/settingsStyles.hbs";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/social/settingsStyles.hbs", "/home/637743.cloudwaysapps.com/bymfapzsnw/public_html/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/social/settingsStyles.hbs");
    }
}
