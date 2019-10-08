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
class jsHelpers
{

    public function outputMessages($variable_name, $language_code = null)
    {
        $messages = JavascriptHelpers::getInstance()->service->loadMessages($language_code);
        $messages_json = json_encode($messages);
        $js_declaration = 'var '.$variable_name.' = '.$messages_json.';';
        $raw_declaration = TemplateHelper::raw($js_declaration);
        return $raw_declaration;
    }

    public function getMessages($language_code = null)
    {
        $messages = JavascriptHelpers::getInstance()->service->loadMessages($language_code);
        return $messages;
    }

}
