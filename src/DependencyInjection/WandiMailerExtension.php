<?php

declare(strict_types=1);

namespace Wandi\MailerBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader;

final class WandiMailerExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration($this->getConfiguration([], $container), $config);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setAlias('wandi.mailer.email_renderer.adapter', $config['renderer_adapter']);
        $container->setAlias('wandi.mailer.email_sender.adapter', $config['sender_adapter']);

        $container->setParameter('wandi.mailer.sender_name', $config['sender']['name']);
        $container->setParameter('wandi.mailer.sender_address', $config['sender']['address']);
    }
}
