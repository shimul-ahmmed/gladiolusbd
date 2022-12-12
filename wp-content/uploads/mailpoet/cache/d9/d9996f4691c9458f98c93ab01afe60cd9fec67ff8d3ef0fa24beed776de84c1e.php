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

/* emails/statsNotificationAutomatedEmails.html */
class __TwigTemplate_1c9a137718cfb7185d2c5c881c2672e02c65ed493f062c006b5a320d132f9778 extends \MailPoetVendor\Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "emails/statsNotificationLayout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("emails/statsNotificationLayout.html", "emails/statsNotificationAutomatedEmails.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<tr>
  <td class=\"mailpoet_content\" align=\"center\" style=\"border-collapse:collapse\">
    <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-spacing:0;mso-table-lspace:0;mso-table-rspace:0;border-collapse:collapse\">
      <tbody>
      <tr>
        <td style=\"padding-left:0;padding-right:0;border-collapse:collapse\">
          <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"mailpoet_cols-one\" style=\"border-spacing:0;mso-table-lspace:0;mso-table-rspace:0;table-layout:fixed;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0;border-collapse:collapse\">
            <tbody>
            <tr>
              <td class=\"mailpoet_spacer\" height=\"36\" valign=\"top\" style=\"border-collapse:collapse\"></td>
            </tr>
            <tr>
              <td class=\"mailpoet_image mailpoet_padded_vertical mailpoet_padded_side\" align=\"center\" valign=\"top\" style=\"border-collapse:collapse;padding-bottom:20px;padding-left:20px;padding-right:20px\">
                <img src=\"";
        // line 18
        echo $this->extensions['MailPoet\Twig\Assets']->generateCdnUrl("logo-orange-400x122.png");
        echo "\" width=\"80\" alt=\"new_logo_orange\" style=\"height:auto;max-width:100%;-ms-interpolation-mode:bicubic;border:0;display:block;outline:none;text-align:center\" />
              </td>
            </tr>
            <tr>
              <td class=\"mailpoet_spacer\" height=\"26\" valign=\"top\" style=\"border-collapse:collapse\"></td>
            </tr>
            <tr>
              <td class=\"mailpoet_text mailpoet_padded_vertical mailpoet_padded_side\" valign=\"top\" style=\"word-break:break-word;word-wrap:break-word;padding-top:0;border-collapse:collapse;padding-bottom:20px;padding-left:20px;padding-right:20px\">
                <h1 style=\"text-align:center;padding:0;font-style:normal;font-weight:normal;margin:0 0 12px;color:#111111;font-family:'Trebuchet MS','Lucida Grande','Lucida Sans Unicode','Lucida Sans',Tahoma,sans-serif;font-size:40px;line-height:64px\">
                  <strong>";
        // line 27
        echo $this->extensions['MailPoet\Twig\I18n']->translate("Your monthly stats are in!");
        echo "</strong>
                </h1>
              </td>
            </tr>
            <tr>
              <td class=\"mailpoet_spacer\" height=\"55\" valign=\"top\" style=\"border-collapse:collapse\"></td>
            </tr>
            </tbody>
          </table>
        </td>
      </tr>
      </tbody>
    </table>
  </td>
</tr>

";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = \MailPoetVendor\twig_ensure_traversable(($context["newsletters"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["newsletter"]) {
            // line 44
            echo "  <tr>
    <td class=\"mailpoet_content\" align=\"center\" style=\"border-collapse:collapse\">
      <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse;border-spacing:0;mso-table-lspace:0;mso-table-rspace:0\">
        <tbody>
        <tr>
          <td style=\"border-collapse:collapse;padding-left:0;padding-right:0\">
            <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"mailpoet_cols-one\" style=\"border-collapse:collapse;border-spacing:0;mso-table-lspace:0;mso-table-rspace:0;table-layout:fixed;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0\">
              <tbody>
              <tr>
                <td class=\"mailpoet_divider\" valign=\"top\" style=\"border-collapse:collapse;padding:29.5px 20px 29.5px 20px\">
                  <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse;border-spacing:0;mso-table-lspace:0;mso-table-rspace:0\">
                    <tr>
                      <td class=\"mailpoet_divider-cell\" style=\"border-collapse:collapse;border-top-width:1px;border-top-style:solid;border-top-color:#e8e8e8\">
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td class=\"mailpoet_text mailpoet_padded_vertical mailpoet_padded_side\" valign=\"top\" style=\"border-collapse:collapse;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;word-break:break-word;word-wrap:break-word\">
                  <h2 class=\"title\" style=\"margin:0 0 7.8px;color:#222222;font-family:lato,'helvetica neue',helvetica,arial,sans-serif;font-size:26px;line-height:31.2px;margin-bottom:0;text-align:center;padding:0;font-style:normal;font-weight:normal\">
                    <strong>
                      <a href=\"";
            // line 66
            echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "linkStats", [], "any", false, false, false, 66), "html", null, true);
            echo "\" style=\"color:#0074a2;text-decoration:underline\">
                        ";
            // line 67
            echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "subject", [], "any", false, false, false, 67), "html", null, true);
            echo "
                      </a>
                    </strong>
                  </h2>
                </td>
              </tr>
              <tr>
                <td class=\"mailpoet_spacer\" height=\"28\" valign=\"top\" style=\"border-collapse:collapse\"></td>
              </tr>
              </tbody>
            </table>
          </td>
        </tr>
        </tbody>
      </table>
    </td>
  </tr>

  <tr>
    <td class=\"mailpoet_content-cols-two\" align=\"left\" style=\"border-collapse:collapse\">
      <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse;border-spacing:0;mso-table-lspace:0;mso-table-rspace:0\">
        <tbody>
        <tr>
          <td align=\"center\" style=\"border-collapse:collapse;font-size:0\"><!--[if mso]>
            <table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">
              <tbody>
              <tr>
                <td width=\"330\" valign=\"top\">
            <![endif]--><div style=\"display:inline-block; max-width:330px; vertical-align:top; width:100%;\">
              <table width=\"330\" class=\"mailpoet_cols-two\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse;width:100%;max-width:330px;border-spacing:0;mso-table-lspace:0;mso-table-rspace:0;table-layout:fixed;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0\">
                <tbody>
                <tr>
                  <td class=\"mailpoet_padded_vertical mailpoet_padded_side\" valign=\"top\" style=\"border-collapse:collapse;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px\">
                    <div>
                      <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"border-collapse:collapse;border-spacing:0;mso-table-lspace:0;mso-table-rspace:0\">
                        <tr>
                          <td class=\"mailpoet_button-container\" style=\"border-collapse:collapse;text-align:center\"><!--[if mso]>
                            <v:roundrect xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:w=\"urn:schemas-microsoft-com:office:word\"
                                         href=\"";
            // line 105
            echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "linkStats", [], "any", false, false, false, 105), "html", null, true);
            echo "\"
                                         style=\"height:20px;
                             width:50px;
                             v-text-anchor:middle;\"
                                         arcsize=\"15%\"
                                         strokeweight=\"0px\"
                                         strokecolor=\"#0074a2\"
                                         fillcolor=\"";
            // line 112
            echo $this->extensions['MailPoet\Twig\Functions']->openedStatsColor(\MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "opened", [], "any", false, false, false, 112));
            echo "\">
                              <w:anchorlock/>
                              <center style=\"color:#ffffff;
                      font-family:Arial;
                      font-size:10px;
                      font-weight:bold;\">";
            // line 117
            echo $this->extensions['MailPoet\Twig\Functions']->openedStatsText(\MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "opened", [], "any", false, false, false, 117));
            echo "
                              </center>
                            </v:roundrect>
                            <![endif]--><a class=\"mailpoet_button\" href=\"";
            // line 120
            echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "linkStats", [], "any", false, false, false, 120), "html", null, true);
            echo "\" style=\"color:#ffffff;text-decoration:none !important;display:inline-block;-webkit-text-size-adjust:none;mso-hide:all;text-align:center;background-color:";
            echo $this->extensions['MailPoet\Twig\Functions']->openedStatsColor(\MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "opened", [], "any", false, false, false, 120));
            echo ";border-color:#0074a2;border-width:0px;border-radius:3px;border-style:solid;width:80px;line-height:20px;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:10px;font-weight:normal\">
                              ";
            // line 121
            echo $this->extensions['MailPoet\Twig\Functions']->openedStatsText(\MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "opened", [], "any", false, false, false, 121));
            echo "
                            </a>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class=\"mailpoet_text mailpoet_padded_vertical mailpoet_padded_side\" valign=\"top\" style=\"border-collapse:collapse;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;word-break:break-word;word-wrap:break-word\">
                    <h3 style=\"margin:0 0 5.4px;color:#333333;font-family:'Courier New',Courier,'Lucida Sans Typewriter','Lucida Typewriter',monospace;font-size:18px;line-height:21.6px;margin-bottom:0;text-align:center;padding:0;font-style:normal;font-weight:normal\">
                      <span style=\"color: ";
            // line 132
            echo $this->extensions['MailPoet\Twig\Functions']->openedStatsColor(\MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "opened", [], "any", false, false, false, 132));
            echo ";\">
                        <strong>";
            // line 133
            echo number_format_i18n(\MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "opened", [], "any", false, false, false, 133), 1);
            echo "% </strong>
                        <span style=\"color: #000000;\">
                          ";
            // line 135
            echo $this->extensions['MailPoet\Twig\I18n']->translate("open rate");
            echo "
                        </span>
                      </span>
                    </h3>
                  </td>
                </tr>
                </tbody>
              </table>
            </div><!--[if mso]>
            </td>
            <td width=\"330\" valign=\"top\">
            <![endif]--><div style=\"display:inline-block; max-width:330px; vertical-align:top; width:100%;\">
              <table width=\"330\" class=\"mailpoet_cols-two\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse;width:100%;max-width:330px;border-spacing:0;mso-table-lspace:0;mso-table-rspace:0;table-layout:fixed;margin-left:auto;margin-right:auto;padding-left:0;padding-right:0\">
                <tbody>
                <tr>
                  <td class=\"mailpoet_padded_vertical mailpoet_padded_side\" valign=\"top\" style=\"border-collapse:collapse;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px\">
                    <div>
                      <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"border-collapse:collapse;border-spacing:0;mso-table-lspace:0;mso-table-rspace:0\">
                        <tr>
                          <td class=\"mailpoet_button-container\" style=\"border-collapse:collapse;text-align:center\"><!--[if mso]>
                            <v:roundrect xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:w=\"urn:schemas-microsoft-com:office:word\"
                                         href=\"";
            // line 156
            echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "linkStats", [], "any", false, false, false, 156), "html", null, true);
            echo "\"
                                         style=\"height:20px;
                             width:80px;
                             v-text-anchor:middle;\"
                                         arcsize=\"15%\"
                                         strokeweight=\"0px\"
                                         strokecolor=\"#0074a2\"
                                         fillcolor=\"";
            // line 163
            echo $this->extensions['MailPoet\Twig\Functions']->clickedStatsColor(\MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "clicked", [], "any", false, false, false, 163));
            echo "\">
                              <w:anchorlock/>
                              <center style=\"color:#ffffff;
                      font-family:Arial;
                      font-size:10px;
                      font-weight:bold;\">";
            // line 168
            echo $this->extensions['MailPoet\Twig\Functions']->clickedStatsText(\MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "clicked", [], "any", false, false, false, 168));
            echo "
                              </center>
                            </v:roundrect>
                            <![endif]--><a class=\"mailpoet_button\" href=\"";
            // line 171
            echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "linkStats", [], "any", false, false, false, 171), "html", null, true);
            echo "\" style=\"color:#ffffff;text-decoration:none !important;display:inline-block;-webkit-text-size-adjust:none;mso-hide:all;text-align:center;background-color:";
            echo $this->extensions['MailPoet\Twig\Functions']->clickedStatsColor(\MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "clicked", [], "any", false, false, false, 171));
            echo ";border-color:#0074a2;border-width:0px;border-radius:3px;border-style:solid;width:80px;line-height:20px;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:10px;font-weight:normal\">
                              ";
            // line 172
            echo $this->extensions['MailPoet\Twig\Functions']->clickedStatsText(\MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "clicked", [], "any", false, false, false, 172));
            echo "
                            </a>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class=\"mailpoet_text mailpoet_padded_vertical mailpoet_padded_side\" valign=\"top\" style=\"border-collapse:collapse;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;word-break:break-word;word-wrap:break-word\">
                    <h3 style=\"margin:0 0 5.4px;color:#333333;font-family:'Courier New',Courier,'Lucida Sans Typewriter','Lucida Typewriter',monospace;font-size:18px;line-height:21.6px;margin-bottom:0;text-align:center;padding:0;font-style:normal;font-weight:normal\">
                      <span style=\"color: ";
            // line 183
            echo $this->extensions['MailPoet\Twig\Functions']->clickedStatsColor(\MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "clicked", [], "any", false, false, false, 183));
            echo ";\">
                        <strong>
                          <span style=\"color: ";
            // line 185
            echo $this->extensions['MailPoet\Twig\Functions']->clickedStatsColor(\MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "clicked", [], "any", false, false, false, 185));
            echo ";\">";
            echo number_format_i18n(\MailPoetVendor\twig_get_attribute($this->env, $this->source, $context["newsletter"], "clicked", [], "any", false, false, false, 185), 1);
            echo "%</span>
                        </strong>
                        <span style=\"color: #000000;\">
                          ";
            // line 188
            echo $this->extensions['MailPoet\Twig\I18n']->translate("click rate");
            echo "
                        </span>
                      </span>
                    </h3>
                  </td>
                </tr>
                </tbody>
              </table>
            </div><!--[if mso]>
            </td>
            </tr>
            </tbody>
            </table>
            <![endif]--></td>
        </tr>
        </tbody>
      </table>
    </td>
  </tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['newsletter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 208
        echo "
<tr>
  <td class=\"mailpoet_spacer\" height=\"55\" valign=\"top\" style=\"border-collapse:collapse\"></td>
</tr>

";
    }

    public function getTemplateName()
    {
        return "emails/statsNotificationAutomatedEmails.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  330 => 208,  304 => 188,  296 => 185,  291 => 183,  277 => 172,  271 => 171,  265 => 168,  257 => 163,  247 => 156,  223 => 135,  218 => 133,  214 => 132,  200 => 121,  194 => 120,  188 => 117,  180 => 112,  170 => 105,  129 => 67,  125 => 66,  101 => 44,  97 => 43,  78 => 27,  66 => 18,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "emails/statsNotificationAutomatedEmails.html", "/home/637743.cloudwaysapps.com/bymfapzsnw/public_html/wp-content/plugins/mailpoet/views/emails/statsNotificationAutomatedEmails.html");
    }
}
