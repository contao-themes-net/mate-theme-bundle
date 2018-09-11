<?php

namespace ContaoThemesNet\MateThemeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class MateThemeBundleExtension extends Extension
{
    /**
     * Usage in Controller
     *
     * $custom = $this->container->getParameter( 'mate_theme.assets.custom_scss' );
     *
     */

    /**
     * {@inheritdoc}
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        foreach ($this->files as $file) {
            $loader->load($file);
        }

        $container->setParameter( 'mate_theme.assets.custom_scss', $mergedConfig[ 'assets.custom_scss' ]);
        $container->setParameter( 'mate_theme.assets.custom_variables_scss', $mergedConfig[ 'assets.custom_variables_scss' ]);
    }
}
