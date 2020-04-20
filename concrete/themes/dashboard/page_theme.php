<?php
namespace Concrete\Theme\Dashboard;

use Concrete\Core\Area\Layout\Preset\Provider\ThemeProviderInterface;
use Concrete\Core\Page\Theme\BedrockThemeTrait;

class PageTheme extends \Concrete\Core\Page\Theme\Theme
{

    use BedrockThemeTrait {
        registerAssets as bedrockRegisterAssets;
    }
    
    public function registerAssets()
    {
        $this->bedrockRegisterAssets();
        $this->providesAsset('core/cms');
        $this->requireAsset('javascript', 'google-charts');
    }

}
