<?php

namespace modules\site\assets;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class LoginStyles extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = '@webroot/dist';

        $this->depends = [
            CpAsset::class,
        ];

        $this->css = [
            'login.css',
        ];

        parent::init();
    }
}
