<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Sylius Sp. z o.o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Behat\Page\Admin\ChannelPricingLogEntry;

use Sylius\Behat\Page\Admin\Crud\IndexPageInterface as BaseIndexPageInterface;

interface IndexPageInterface extends BaseIndexPageInterface
{
    public function isLogEntryWithPriceAndOriginalPrice(string $price, string $originalPrice): bool;

    public function isLogEntryWithPriceAndOriginalPriceOnPosition(string $price, string $originalPrice, int $position): bool;
}