<?php

namespace ContaoThemesNet\MateThemeBundle\Events;

use Composer\Script\Event;
use Contao\CoreBundle\Util\SymlinkUtil;

class Installer
{
    /**
     * @var string
     */
    private $rootDir;


    public function initialize(Event $event)
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
    private function symlinkTemplateResources()
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
    private function symlinkThemeResources()
    {
        SymlinkUtil::symlink(
            'vendor/contao-themes-net/mate-theme-bundle/src/Resources/public',
            'files/mate10',
            $this->rootDir
        );
    }
}
