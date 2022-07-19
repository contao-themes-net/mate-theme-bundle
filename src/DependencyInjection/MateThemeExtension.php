<?php

namespace ContaoThemesNet\MateThemeBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class MateThemeExtension extends Extension
{
    /**
     * Usage in Controller
     *
     * $custom = $this->container->getParameter( 'mate_theme.assets.custom_scss' );
     *
     */
    public function load(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $loader->load('services.yml');
        $loader->load('commands.yml');
        $loader->load('config.yml');

        $container->setParameter( 'mate_theme.assets.scss_sources', $mergedConfig[ 'assets.scss_sources' ]);
        $container->setParameter( 'mate_theme.assets.custom_scss', $mergedConfig[ 'assets.custom_scss' ]);
        $container->setParameter( 'mate_theme.assets.custom_variables_scss', $mergedConfig[ 'assets.custom_variables_scss' ]);
    }
}
