<?php

declare(strict_types=1);

/*
 * mate theme for Contao Open Source CMS
 *
 * Copyright (C) 2022 pdir / digital agentur <develop@pdir.de>
 *
 * @package    contao-themes-net/mate-theme-bundle
 * @link       https://github.com/contao-themes-net/mate-theme-bundle
 * @license    pdir contao theme licence
 * @author     Mathias Arzberger <develop@pdir.de>
 * @author     Philipp Seibt <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ContaoThemesNet\MateThemeBundle;

use Contao\Combiner;
use Contao\StringUtil;
use Contao\System;

class ThemeUtils
{
    public static string $themeFolder = 'bundles/contaothemesnetmatetheme/';
    public static string $scssFolder = 'sass/';

    public static function getRootDir()
    {
        return System::getContainer()->getParameter('kernel.project_dir');
    }

    public static function getWebDir(): string
    {
        return StringUtil::stripRootDir(System::getContainer()->getParameter('contao.web_dir'));
    }

    public static function getCombinedStylesheet($theme = null): string
    {
        self::$scssFolder = self::$themeFolder.self::$scssFolder;

        // for multi domain setup
        if (null !== $theme) {
            self::$sassFolder = 'files/mate/sass/'.$theme.'/';
        }

        // add stylesheets
        $combiner = new Combiner();
        $combiner->add(self::$scssFolder.'mate.scss');

        return $combiner->getCombinedFile();
    }

    public static function getCombinedJavascript(): string
    {
        // add javascripts
        $combiner = new Combiner();

        $combiner->add(self::$themeFolder.'js/materialize/materialize.min.js');
        $combiner->add(self::$themeFolder.'js/headroom/headroom.min.js');
        $combiner->add(self::$themeFolder.'js/theme.min.js');

        return $combiner->getCombinedFile();
    }
}
