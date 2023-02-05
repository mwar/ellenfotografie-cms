<?php

namespace Concrete\Package\Ellenfotografie;

use \Concrete\Core\Package\Package;
use \Concrete\Core\Page\Theme\Theme;

defined('C5_EXECUTE') or die('Access Denied.');

class Controller extends Package
{
    protected $pkgHandle = 'ellenfotografie';
    protected $appVersionRequired = '9.0.2';
    protected $pkgVersion = '0.2';

    public function getPackageDescription()
    {
        return t('A package for Ellen Fotografie');
    }

    public function getPackageName()
    {
        return t('Ellenfotografie');
    }

    public function install()
    {
        $pkg = parent::install();
        $this->installContentFile('install/theme.xml');
//        $theme = Theme::('ellenfotografie', $pkg);
        // Our custom package installation code will go here.
    }

    public function upgrade()
    {
        parent::upgrade();
        $this->installContentFile('install/theme.xml');
        // Our custom package upgrade code will go here.
    }
}
