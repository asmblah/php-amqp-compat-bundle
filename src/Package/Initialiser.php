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

namespace Asmblah\PhpAmqpCompatBundle\Package;

use Asmblah\PhpAmqpCompat\AmqpManager;
use Asmblah\PhpAmqpCompat\Configuration\Configuration;
use Psr\Log\LoggerInterface;

/**
 * Class Initialiser.
 *
 * Initialises PHP AMQP-Compat.
 *
 * @author Dan Phillimore <dan@ovms.co>
 */
class Initialiser implements InitialiserInterface
{
    public function __construct(
        private readonly LoggerInterface $logger
    ) {
    }

    /**
     * @inheritDoc
     */
    public function initialise(): void
    {
        AmqpManager::setConfiguration(new Configuration(logger: $this->logger));
    }
}
