<?php
/**
 * Javascript helpers plugin for Craft CMS 3.x
 *
 * Twig tools for working with Javascript in templates
 *
 * @link      http://craftsnippets.com
 * @copyright Copyright (c) 2019 Piotr Pogorzelski
 */

namespace craftsnippets\javascripthelpers\services;

use craftsnippets\javascripthelpers\JavascriptHelpers;

use Craft;
use craft\base\Component;

/**
 * @author    Piotr Pogorzelski
 * @package   JavascriptHelpers
 * @since     1.0.0
 */
class JavascriptHelpersService extends Component
{

    public function loadMessages($language_code)
    {

        if(!is_string($language_code)){
            $language_code = Craft::$app->getSites()->currentSite->language;
        }

        $path = '../translations/'.$language_code.'/site.php';
        if(file_exists($path)){
            $messages = include $path;
            return $messages;
        }

    }
    
}
