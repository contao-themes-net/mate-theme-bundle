<?php

declare(strict_types=1);

/*
 * mate theme for Contao Open Source CMS
 *
 * Copyright (C) 2025 pdir / digital agentur <develop@pdir.de>
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
use Contao\Input;
use Contao\StringUtil;
use Contao\System;

class ThemeUtils
{
    public static string $themeFolder = 'bundles/contaothemesnetmatetheme/';
    public static string $scssFolder = 'sass/';

    /**
     * @var array<string>
     */
    public static array $colors = [
        'blue_colors',
        'blue_colors_contrast',
        'dark_colors',
        'dark_colors_contrast',
        'green_colors',
        'green_colors_contrast',
        'yellow_colors',
        'yellow_colors_contrast',
        'red_colors_contrast',
    ];

    public static function getRootDir(): string
    {
        return System::getContainer()->getParameter('kernel.project_dir');
    }

    public static function getWebDir(): string
    {
        return StringUtil::stripRootDir(System::getContainer()->getParameter('contao.web_dir'));
    }

    public static function getCombinedStylesheet(null|bool|string $theme = null): string
    {
        $scssFolder = self::$themeFolder.self::$scssFolder;

        // for multi domain setup
        if (null !== $theme) {
            $scssFolder = 'files/mate/sass/'.$theme.'/';
        }

        // Get session for theme switcher
        $session = System::getContainer()->get('request_stack')->getSession();

        // add stylesheets
        $combiner = new Combiner();

        // Check for v2 or use old stylesheets
        if ($isV2 = file_exists(self::getRootDir().'/files/mate/.v2')) {
            $combiner->add($scssFolder.'v2/mate.scss');
        } else {
            $combiner->add($scssFolder.'mate.scss');
        }

        $request = System::getContainer()->get('request_stack')->getCurrentRequest();

        // Execute code only in preview mode
        if ($request->attributes->get('_preview')) {
            if ('reset' === Input::get('theme-color')) {
                $session->set('mate_color', null);
            }

            if (Input::get('theme-color') && \in_array(Input::get('theme-color'), self::$colors, true)) {
                $session->set('mate_color', Input::get('theme-color'));
            }

            if ($isV2 && $session->get('mate_color') && null !== $session->get('mate_color')) {
                $combiner->add($scssFolder.'v2/mate_color_schemes/mate_'.$session->get('mate_color').'.scss');
            }
        }

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
