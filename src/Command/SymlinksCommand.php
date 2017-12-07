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

use Contao\CoreBundle\Command\AbstractLockedCommand;
use Contao\CoreBundle\Util\SymlinkUtil;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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
    protected function configure()
    {
        $this
            ->setName('contao:install')
            ->setDefinition([
                new InputArgument('target', InputArgument::OPTIONAL, 'The target directory', 'files'),
            ])
            ->setDescription('Symlinks the required Mate Theme resources')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function executeLocked(InputInterface $input, OutputInterface $output)
    {
        $this->io->text("constructer for Symlinks\n");

        try {


            $this->rootDir = $this->getContainer()->getParameter('kernel.project_dir');
            $this->io->text("Root DIR <comment>$this->rootDir</comment>.\n");

            $this->symlinkThemeResources();

        } catch (\InvalidArgumentException $e) {
            $output->writeln(sprintf('%s (see help contao:install).', $e->getMessage()));
            return 1;
        }
        return 0;


    }

    /**
     * Symlinks the mate theme folder resources to files/mate.
     */
    private function symlinkThemeResources()
    {
        SymlinkUtil::symlink(
            'vendor/contao-themes-net/mate-theme-bundle/src/Resources/public',
            'files/mate11',
            $this->rootDir
        );
        $this->io->text("Symlinked the <comment>mate theme</comment> folder.\n");
    }
}
