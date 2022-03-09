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

namespace ContaoThemesNet\MateThemeBundle\Events;

use Composer\Script\Event;
use Contao\CoreBundle\Util\SymlinkUtil;

class Installer
{
    /**
     * @var string
     */
    private $rootDir;

    public function initialize(Event $event): void
    {
        $this->rootDir = $this->getContainer()->getParameter('kernel.project_dir');

        // symlink resource folder
        $this->symlinkThemeResources();

        // copy example custom files
        // @todo implement copying files

        // symlink template folder
        $this->symlinkTemplateResources();
    }

    /**
     * Symlinks the mate template folder to template/mate.
     */
    private function symlinkTemplateResources(): void
    {
        SymlinkUtil::symlink(
            'vendor/contao-themes-net/mate-theme-bundle/src/template/mate',
            'template/mate9',
            $this->rootDir
        );
    }

    /**
     * Symlinks the mate theme folder resources to files/mate.
     */
    private function symlinkThemeResources(): void
    {
        SymlinkUtil::symlink(
            'vendor/contao-themes-net/mate-theme-bundle/src/Resources/public',
            'files/mate10',
            $this->rootDir
        );
    }
}
