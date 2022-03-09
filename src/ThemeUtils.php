<?php

namespace ContaoThemesNet\MateThemeBundle;

use Contao\Combiner;
use Contao\File;
use Contao\System;
use Contao\StringUtil;

class ThemeUtils
{
    public static function getRootDir() {
        return System::getContainer()->getParameter('kernel.project_dir');
    }

    public static function getWebDir() {
        return StringUtil::stripRootDir(System::getContainer()->getParameter('contao.web_dir'));
    }

    public static function getCombinedStylesheet() {

        // add stylesheets
        $combiner = new Combiner();

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $combiner->add('bundles/matetheme/sass/mate_win.scss');
        } else {
            $combiner->add('bundles/matetheme/sass/mate.scss');
        }

        return $combiner->getCombinedFile();
    }
}
