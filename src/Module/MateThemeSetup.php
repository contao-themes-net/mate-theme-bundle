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

namespace ContaoThemesNet\MateThemeBundle\Module;

use ContaoThemesNet\MateThemeBundle\ThemeUtils;

class MateThemeSetup extends \BackendModule
{
    public const VERSION = '3.0.0';

    protected $strTemplate = 'be_mateTheme_setup';

    /**
     * Generate the module.
     */
    protected function compile(): void
    {
        switch (\Input::get('act')) {
            case 'syncFolder':
                $path = sprintf(
                    '%s/%s/bundles/contaothemesnetmatetheme',
                    ThemeUtils::getRootDir(),
                    ThemeUtils::getWebDir()
                );

                if (!file_exists('files/mate')) {
                    new \Folder('files/mate');
                }
                $this->getFiles($path);
                $this->getSqlFiles(ThemeUtils::getRootDir().'/vendor/contao-themes-net/mate-theme-bundle/src/templates/mate');
                $this->Template->message = true;
                $this->Template->version = self::VERSION;
                $this->import('Automator');
                $this->Automator->purgeInternalCache();
                $this->Automator->generateInternalCache();
                break;

            case 'truncateTlFiles':
                $this->import('Database');
                $this->Database->prepare('TRUNCATE tl_files')->execute();
                $this->Template->messageTruncate = true;
                $this->Template->version = self::VERSION;
                break;

            default:
                $this->Template->version = self::VERSION;
        }
    }

    protected function getFiles($path): void
    {
        foreach (scan($path) as $dir) {
            if (!is_dir($path.'/'.$dir)) {
                $pos = strpos($path, 'contaothemesnetmatetheme');
                $filesFolder = 'files/mate'.str_replace('contaothemesnetmatetheme', '', substr($path, $pos)).'/'.$dir;

                if ('_mate_variables.scss' !== $dir && '_mate_colors.scss' !== $dir && 'backend.css' !== $dir && 'mate.scss' !== $dir && 'materialize.scss' !== $dir && 'maklermodul.scss' !== $dir && 'style.scss' !== $dir && 'mate_win.scss' !== $dir && 'materialize_win.scss' !== $dir && 'hofff_consent.scss' !== $dir && 'mobilede.scss' !== $dir && 'spacing-helpers.scss' !== $dir) {
                    if (!file_exists(ThemeUtils::getRootDir().'/'.$filesFolder)) {
                        $objFile = new \File(ThemeUtils::getWebDir().'/bundles/'.substr($path, $pos).'/'.$dir, true);
                        $objFile->copyTo($filesFolder);
                    }
                }
            } else {
                $folder = $path.'/'.$dir;
                $pos = strpos($path, 'contaothemesnetmatetheme');
                $filesFolder = 'files/mate'.str_replace('contaothemesnetmatetheme', '', substr($path, $pos)).'/'.$dir;

                if ('fonts' !== $dir && 'js' !== $dir && 'components' !== $dir && 'mate_color_schemes' !== $dir && 'css' !== $dir) {
                    if (!file_exists($filesFolder)) {
                        new \Folder($filesFolder);
                    }
                    $this->getFiles($folder);
                }
            }
        }
    }

    protected function getSqlFiles($path): void
    {
        foreach (scan($path) as $dir) {
            if (!is_dir($path.'/'.$dir)) {
                $pos = strpos($path, '/vendor');
                $filesFolder = 'templates/'.$dir;
                $objFile = new \File(substr($path, $pos).'/'.$dir, true);
                $objFile->copyTo($filesFolder);
            }
        }
    }
}
