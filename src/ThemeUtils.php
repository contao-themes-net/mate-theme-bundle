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
    public static function getRootDir()
    {
        return System::getContainer()->getParameter('kernel.project_dir');
    }

    public static function getWebDir(): string
    {
        return StringUtil::stripRootDir(System::getContainer()->getParameter('contao.web_dir'));
    }

    public static function getCombinedStylesheet(): string
    {
        // add stylesheets
        $combiner = new Combiner();

        if ('WIN' === strtoupper(substr(PHP_OS, 0, 3))) {
            $combiner->add('bundles/contaothemesnetmatetheme/sass/mate_win.scss');
        } else {
            $combiner->add('bundles/contaothemesnetmatetheme/sass/mate.scss');
        }

        return $combiner->getCombinedFile();
    }

    public static function getCombinedJavascript(): string
    {
        // add javascripts
        $combiner = new Combiner();

        $combiner->add('bundles/contaothemesnetmatetheme/js/materialize/materialize.min.js');
        $combiner->add('bundles/contaothemesnetmatetheme/js/headroom/headroom.min.js');
        $combiner->add('bundles/contaothemesnetmatetheme/js/theme.min.js');

        return $combiner->getCombinedFile();

    }
}
