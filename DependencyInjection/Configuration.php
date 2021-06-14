<?php


namespace ALPIXEL\Bundle\RedirectBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('alpixel_redirect');

        $treeBuilder->getRootNode()
                    ->children()
                    ->arrayNode('rules')
                    ->prototype('array')
                    ->prototype('scalar')
                    ->end()
                    ->end()
                    ->end()
                    ->end();

        return $treeBuilder;
    }
}
