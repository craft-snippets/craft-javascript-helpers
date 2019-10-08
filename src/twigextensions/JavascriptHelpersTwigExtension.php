<?php
/**
 * Javascript helpers plugin for Craft CMS 3.x
 *
 * Twig tools for working with Javascript in templates
 *
 * @link      http://craftsnippets.com
 * @copyright Copyright (c) 2019 Piotr Pogorzelski
 */

namespace craftsnippets\javascripthelpers\twigextensions;

use craftsnippets\javascripthelpers\JavascriptHelpers;

use Craft;
use craft\helpers\Template as TemplateHelper;
use Exception;

/**
 * @author    Piotr Pogorzelski
 * @package   JavascriptHelpers
 * @since     1.0.0
 */
class JavascriptHelpersTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'JavascriptHelpers';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('jsVar', [$this, 'jsVarFunction']),
        ];
    }

    public function jsVarFunction($twig_variable, $variable_name)
    {
        if(!is_string($variable_name)){
            throw new Exception('Variable name must be a string.');
        }
        $json = json_encode($twig_variable);
        $js_declaration = 'var '.$variable_name.' = '.$json.';';
        return TemplateHelper::raw($js_declaration);
    }
}
