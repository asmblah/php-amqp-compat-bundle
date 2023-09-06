<?php

/*
 * PHP AMQP-Compat Bundle
 * Copyright (c) Dan Phillimore (asmblah)
 * https://github.com/asmblah/php-amqp-compat-bundle/
 *
 * Released under the MIT license.
 * https://github.com/asmblah/php-amqp-compat-bundle/raw/main/MIT-LICENSE.txt
 */

declare(strict_types=1);

namespace Asmblah\PhpAmqpCompatBundle\DependencyInjection;

use Asmblah\PhpAmqpCompatBundle\Package\Initialiser;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\LoaderResolver;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\DirectoryLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class PhpAmqpCompatExtension.
 *
 * @author Dan Phillimore <dan@ovms.co>
 */
class PhpAmqpCompatExtension extends Extension
{
    /**
     * @inheritdoc
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        // Import common configuration.
        $fileLocator = new FileLocator(__DIR__ . '/../Resources/config');
        $loader = new DirectoryLoader($container, $fileLocator);
        $yamlFileLoader = new YamlFileLoader($container, $fileLocator);
        $loader->setResolver(new LoaderResolver([
            $yamlFileLoader,
            $loader,
        ]));
        $loader->load('services/');

        // Configure PHP AMQP-Compat.
        $loggerConfig = $config['logger'] ?? [];
        $loggerServiceId = $loggerConfig['service'] ?? null;
        $loggerChannel = $loggerConfig['channel'] ?? null;

        $initialiserDefinition = $container->findDefinition(Initialiser::class);

        if ($loggerServiceId !== null) {
            $initialiserDefinition->setArgument(0, new Reference($loggerServiceId));
        }

        if ($loggerChannel !== null) {
            $initialiserDefinition->addTag('monolog.logger', ['channel' => $loggerChannel]);
        }
    }
}
