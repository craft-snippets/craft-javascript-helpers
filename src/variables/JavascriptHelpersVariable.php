<?php
/**
 * Javascript helpers plugin for Craft CMS 3.x
 *
 * Twig tools for working with Javascript in templates
 *
 * @link      http://craftsnippets.com
 * @copyright Copyright (c) 2019 Piotr Pogorzelski
 */

namespace craftsnippets\javascripthelpers\variables;

use craftsnippets\javascripthelpers\JavascriptHelpers;

use Craft;
use craft\helpers\Template as TemplateHelper;

/**
 * @author    Piotr Pogorzelski
 * @package   JavascriptHelpers
 * @since     1.0.0
 */
class JavascriptHelpersVariable
{

    public function outputMessages($variable_name, $language_code = null)
    {
        $messages = JavascriptHelpers::getInstance()->service->loadMessages($language_code);
        Craft::$app->getView()->registerJsVar($variable_name, $messages, craft\web\View::POS_END);
    }

    public function getMessages($language_code = null)
    {
        $messages = JavascriptHelpers::getInstance()->service->loadMessages($language_code);
        return $messages;
    }

}
