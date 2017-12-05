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

namespace ContaoThemesNet\MateThemeBundle\Command;

use Contao\CoreBundle\Util\SymlinkUtil;
use Contao\CoreBundle\Command\AbstractLockedCommand;

/**
 * Symlinks the public mate theme resources into the files directory
 *
 * @author     Mathias Arzberger <develop@pdir.de>
 *
 */

class SymlinksCommand extends AbstractLockedCommand
{
    /**
     * @var string
     */
    private $rootDir;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->rootDir = $this->getContainer()->getParameter('kernel.project_dir');

        $this->symlinkThemeResources();
    }

    /**
     * Symlinks the mate theme folder resources to files/mate.
     */
    private function symlinkThemeResources()
    {
        SymlinkUtil::symlink(
            'vendor/contao-themes-net/mate-theme-bundle/src/Resources/public',
            'files/mate',
            $this->rootDir
        );
        $this->io->text("Symlinked the <comment>mate theme</comment> folder.\n");
    }
}
