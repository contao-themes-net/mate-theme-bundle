<?php

/**
 * mate theme for Contao Open Source CMS
 *
 * Copyright (C) 2017 pdir / digital agentur <develop@pdir.de>
 *
 * @package    contao-themes-net/mate-theme-bundle
 * @link       https://github.com/contao-themes-net/mate-theme-bundle
 * @license    pdir contao theme licence
 * @author     Mathias Arzberger <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ContaoThemesNet\MateThemeBundle\ContaoManager;

use Pdir\ThemeHelperBundle\ThemeHelperBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use ContaoBootstrap\Grid\ContaoBootstrapGridBundle;
use ContaoThemesNet\MateThemeBundle\MateThemeBundle;

/**
 * Plugin for the Contao Manager.
 *
 * @author Mathias Arzberger <develop@pdir.de>
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(MateThemeBundle::class)
                ->setLoadAfter(
                    [
                        ThemeHelperBundle::class,
                        ContaoBootstrapGridBundle::class
                    ]
                )
        ];
    }
}
