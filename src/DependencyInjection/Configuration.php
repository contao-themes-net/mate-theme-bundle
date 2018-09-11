<?php

namespace ContaoThemesNet\MateThemeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('mate_theme');

        $rootNode
            ->children()
                ->arrayNode('assets')
                    ->children()
                        ->scalarNode('custom_scss')
                            ->info('Load custom scss from given location')
                            ->defaultValue('files/mate/_custom.scss')
                            ->end()
                        ->scalarNode('custom_varibales_scss')
                            ->info('Load custom variables from given location')
                            ->defaultValue('files/mate/_custom_variables.scss')
                            ->end()
                    ->end()
                ->end() // assets
            ->end()
        ;

        return $treeBuilder;
    }
}
