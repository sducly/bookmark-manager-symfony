<?php

namespace FrontBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('front');
        $rootNode->append($this->webpackNode());
        return $treeBuilder;
    }

    private function webpackNode()
    {
        $treeBuilder = new TreeBuilder();

        /** @var ArrayNodeDefinition $webpackNode */
        $webpackNode = $treeBuilder->root('webpack')->addDefaultsIfNotSet();
        $webpackNode->children()
            ->booleanNode('dev_server_enable')
                ->defaultTrue()
                ->end()
            ->scalarNode('dev_server_host')
                ->defaultValue('http://127.0.0.1')
                ->end()
            ->integerNode('dev_server_port')
                ->defaultValue(9000)
                ->end();
        return $webpackNode;
    }
}
