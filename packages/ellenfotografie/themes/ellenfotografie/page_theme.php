<?php

namespace Concrete\Package\Ellenfotografie\Theme\Ellenfotografie;

use Concrete\Core\Page\Theme\Theme;

class PageTheme extends Theme
{
//    public function registerAssets()
//    {
//        $this->providesAsset('css', 'bootstrap/*');
//        $this->providesAsset('javascript', 'bootstrap/*');
//        $this->providesAsset('javascript', 'jquery');
//    }

    public function getThemeName(): string
    {
        return t('Ellenfotografie');
    }

    public function getThemeDescription(): string
    {
        return t('A theme for Ellen Fotografie');
    }

}