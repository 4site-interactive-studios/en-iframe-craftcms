<?php
namespace EN\iframe;

use EN\iframe\services\EnIframeService;
use EN\iframe\variables\EnIframeVariable;
use EN\iframe\fields\EnIframeField;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;
use craft\services\Fields;
use craft\web\UrlManager;
use craft\events\RegisterComponentTypesEvent;
use craft\events\RegisterUrlRulesEvent;

use yii\base\Event;

class EnIframe extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var EnIframe
     */
    public static $plugin;

    public function init()
    {
        parent::init();
        self::$plugin = $this;


        // Register Components (Services)
        $this->setComponents([
            'service' => EnIframeService::class,
		]);

        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = EnIframeField::class;
            }
        );

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('enIframe', EnIframeVariable::class);
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'en-iframe',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );

        // ...
    }

    // ...
}