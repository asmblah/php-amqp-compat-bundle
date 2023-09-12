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

namespace Asmblah\PhpAmqpCompatBundle\Tests\Functional\Util;

use Psr\Log\AbstractLogger;
use Stringable;

/**
 * Class TestLogger.
 *
 * Logger that is solely used during functional testing of the bundle.
 *
 * @author Dan Phillimore <dan@ovms.co>
 */
class TestLogger extends AbstractLogger
{
    private array $logs = [];

    /**
     * Fetches the recorded logs.
     */
    public function getLogs(): array
    {
        return $this->logs;
    }

    /**
     * @inheritDoc
     */
    public function log($level, Stringable|string $message, array $context = [])
    {
        $this->logs[] = [$level, $message, $context];
    }
}
