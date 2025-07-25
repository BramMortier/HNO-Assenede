<?php

namespace modules\site;

use Craft;
use craft\web\View;
use craft\web\twig\variables\Cp;

use craft\events\RegisterCpNavItemsEvent;
use craft\events\TemplateEvent;
use craft\helpers\App;

use yii\base\Event;
use yii\base\Module;
use yii\base\InvalidConfigException;

use modules\site\assets\LoginStyles;
use modules\site\web\twig\SiteTwigExtension;

class Site extends Module {
    public function init() {
        Craft::setAlias('@modules', __DIR__);

        parent::init();

        $this->controllerNamespace = 'modules\\controllers';

        $this->_registerTwigExtensions();
        $this->_registerEventHandlers();
    }

    private function _registerEventHandlers(): void {
        if (Craft::$app->getRequest()->getIsCpRequest()) {
            Event::on(View::class, View::EVENT_BEFORE_RENDER_TEMPLATE, function (TemplateEvent $event) {
                try {
                    Craft::$app->getView()->registerAssetBundle(LoginStyles::class);
                } catch (InvalidConfigException $e) {
                    Craft::error('Error registering AssetBundle - '.$e->getMessage(), __METHOD__);
                }
            });

            Event::on(Cp::class, Cp::EVENT_REGISTER_CP_NAV_ITEMS, function (RegisterCpNavItemsEvent $event) {
                if (App::env('CRAFT_DEV_MODE') === true) return;

                $hideLabels = [
                    'GraphQL', 
                    'Settings',
                    'Plugin Store',
                ];

                $event->navItems = array_filter($event->navItems, function($item) use ($hideLabels) {
                    return !in_array($item['label'], $hideLabels, true);
                });
            });
        }
    }

    private function _registerTwigExtensions(): void {
        Craft::$app->view->registerTwigExtension(new SiteTwigExtension());
    }
}
