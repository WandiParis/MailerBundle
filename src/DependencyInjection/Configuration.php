<?php

declare(strict_types=1);

namespace Wandi\MailerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('wandi_mailer');

        $rootNode
            ->children()
                ->scalarNode('renderer_adapter')->defaultValue('Wandi\MailerBundle\Renderer\Adapter\EmailTwigAdapter')->end()
                ->scalarNode('sender_adapter')->defaultValue('Wandi\MailerBundle\Sender\Adapter\SwiftMailerAdapter')->end()
            ->end()
            ->children()
                ->arrayNode('sender')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('name')->defaultValue('Example.com Store')->end()
                        ->scalarNode('address')->defaultValue('no-reply@example.com')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
