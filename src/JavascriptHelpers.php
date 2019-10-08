<?php
/**
 * Javascript helpers plugin for Craft CMS 3.x
 *
 * Twig tools for working with Javascript in templates
 *
 * @link      http://craftsnippets.com
 * @copyright Copyright (c) 2019 Piotr Pogorzelski
 */

namespace craftsnippets\javascripthelpers;

use craftsnippets\javascripthelpers\variables\jsHelpers;
use craftsnippets\javascripthelpers\twigextensions\JavascriptHelpersTwigExtension;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Class JavascriptHelpers
 *
 * @author    Piotr Pogorzelski
 * @package   JavascriptHelpers
 * @since     1.0.0
 *
 * @property  JavascriptHelpersServiceService $javascriptHelpersService
 */
class JavascriptHelpers extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var JavascriptHelpers
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new JavascriptHelpersTwigExtension());


    $this->setComponents([
        'service' => \craftsnippets\javascripthelpers\services\JavascriptHelpersService::class,
    ]);

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('jsHelpers', jsHelpers::class);
            }
        );

        Craft::info(
            Craft::t(
                'javascript-helpers',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
