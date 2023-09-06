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

namespace Asmblah\PhpAmqpCompatBundle;

use Asmblah\PhpAmqpCompatBundle\Package\Initialiser;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class PhpAmqpCompatBundle.
 *
 * Configures PHP AMQP-Compat for a Symfony application.
 *
 * @author Dan Phillimore <dan@ovms.co>
 */
class PhpAmqpCompatBundle extends Bundle
{
    public function boot(): void
    {
        $initialiser = $this->container->get(Initialiser::class);

        $initialiser->initialise();
    }
}
