<?php

namespace BenTools\WebPushBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('bentools_webpush');

        $rootNode
            ->children()

                ->arrayNode('settings')
                    ->children()
                        ->scalarNode('public_key')
                        ->isRequired()
                        ->end()
                        ->scalarNode('private_key')
                        ->isRequired()
                        ->end()
                    ->end()
                ->end()

                ->arrayNode('associations')
                ->useAttributeAsKey('name')
                ->arrayPrototype()
                    ->children()
                        ->scalarNode('user_class')
                        ->isRequired()
                        ->end()
                        ->scalarNode('device_class')
                        ->isRequired()
                        ->end()
                        ->scalarNode('manager')
                        ->isRequired()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}