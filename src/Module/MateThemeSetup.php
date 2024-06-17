<?php

declare(strict_types=1);

/*
 * mate theme for Contao Open Source CMS
 *
 * Copyright (C) 2024 pdir / digital agentur <develop@pdir.de>
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

use Contao\BackendModule;

class MateThemeSetup extends BackendModule
{
    public const VERSION = '3.4.1';

    protected $strTemplate = 'be_mateTheme_setup';

    /**
     * Generate the module.
     */
    protected function compile(): void
    {
        $this->Template->version = self::VERSION;
    }
}
