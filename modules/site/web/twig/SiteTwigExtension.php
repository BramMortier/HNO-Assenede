<?php

namespace modules\site\web\twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class SiteTwigExtension extends AbstractExtension {
    public function getFunctions() {
        return [
            new TwigFunction('arrayCountValues', [$this, 'arrayCountValues']),
        ];
    }

    public function arrayCountValues($array) {
        return array_count_values($array);
    }
}