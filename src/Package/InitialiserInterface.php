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

/**
 * Interface InitialiserInterface.
 *
 * Initialises PHP AMQP-Compat.
 *
 * @author Dan Phillimore <dan@ovms.co>
 */
interface InitialiserInterface
{
    /**
     * Initialises PHP AMQP-Compat.
     */
    public function initialise(): void;
}
