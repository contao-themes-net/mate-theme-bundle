<?php

namespace ContaoThemesNet\MateThemeBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;

class MateThemeBundleExtension extends Extension implements PrependExtensionInterface
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
    protected function load(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );

        $loader->load('services.yml');

        foreach ($this->files as $file) {
            $loader->load($file);
        }

        $container->setParameter( 'mate_theme.assets.custom_scss', $mergedConfig[ 'assets.custom_scss' ]);
        $container->setParameter( 'mate_theme.assets.custom_variables_scss', $mergedConfig[ 'assets.custom_variables_scss' ]);
    }

    public function prepend(ContainerBuilder $container)
    {
        $container->loadFromExtension('twig', array(
            'paths' => array(
                '%kernel.project_dir%/vendor/contao-themes-net/mate-theme-bundle/src/Resources/ContaoCoreBundle/views/' => 'ContaoCore',
            ),
        ));
    }
}
