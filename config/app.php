<?php

use craft\helpers\App;
use modules\site\Site;

return [
    'id' => App::env('CRAFT_APP_ID') ?: 'CraftCMS',
    'modules' => [
        'site' => Site::class, 
    ],
    'bootstrap' => [
        'site', 
    ],
];
