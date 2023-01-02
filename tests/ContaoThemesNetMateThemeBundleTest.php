<?php

declare(strict_types=1);

/*
 * mate theme for Contao Open Source CMS
 *
 * Copyright (C) 2023 pdir / digital agentur <develop@pdir.de>
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

namespace ContaoThemesNet\MateThemeBundle\Tests;

use ContaoThemesNet\MateThemeBundle\ContaoThemesNetMateThemeBundle;
use PHPUnit\Framework\TestCase;

class ContaoThemesNetMateThemeBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new ContaoThemesNetMateThemeBundle();

        $this->assertInstanceOf('ContaoThemesNet\MateThemeBundle\ContaoThemesNetMateThemeBundle', $bundle);
    }
}
