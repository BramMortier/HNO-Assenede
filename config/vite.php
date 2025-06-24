<?php

use craft\helpers\App;

$host = Craft::$app->getRequest()->getIsConsoleRequest()
    ? App::env('PRIMARY_SITE_URL')
    : Craft::$app->getRequest()->getHostInfo();

return [
    'useDevServer' => App::env("CRAFT_DEV_MODE"),
    'manifestPath' => '@webroot/dist/.vite/manifest.json',
    'devServerPublic' => "$host:3001",
    'serverPublic' => App::env('PRIMARY_SITE_URL') . '/dist/',
    'errorEntry' => '',
    'cacheKeySuffix' => '',
    'devServerInternal' => '',
	'checkDevServer' => false,
];
