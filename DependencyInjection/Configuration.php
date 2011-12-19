<?php

namespace NSM\Bundle\EmojiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $treeBuilder->root('nsm_emoji', 'array')
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('parser')
                ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('service')->cannotBeEmpty()->defaultValue('nsm_emoji.parser.max')->end()
                    ->end()
                ->end()
                ->scalarNode('size')->cannotBeEmpty()->defaultValue('16')->end()
                ->scalarNode('url')->cannotBeEmpty()->defaultValue('/bundles/nsmemoji/images/emojis/')->end()
            ->end()
        ->end();

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
