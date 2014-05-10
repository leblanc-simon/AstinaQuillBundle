<?php

namespace Astina\Bundle\QuillBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('astina_quill');

        $rootNode
            ->children()
                ->scalarNode('quill_url')->defaultValue('bundles/astinaquill/js/quill.min.js')->end()
                ->scalarNode('toolbar_template')->defaultValue('AstinaQuillBundle:Editor:toolbar.html.twig')->end()
                ->scalarNode('theme')->defaultValue('snow')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
