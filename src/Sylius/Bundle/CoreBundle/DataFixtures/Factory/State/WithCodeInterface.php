<?php

declare(strict_types=1);

namespace Sylius\Bundle\CoreBundle\DataFixtures\Factory\State;

interface WithCodeInterface
{
    /**
     * @return $this
     */
    public function withCode(string $code): self;
}