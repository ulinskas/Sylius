<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Bundle\CoreBundle\DataFixtures\Factory;

use Sylius\Bundle\CoreBundle\DataFixtures\Factory\State\WithChannelsInterface;
use Sylius\Bundle\CoreBundle\DataFixtures\Factory\State\WithCodeInterface;
use Sylius\Bundle\CoreBundle\DataFixtures\Factory\State\WithDescriptionInterface;
use Sylius\Bundle\CoreBundle\DataFixtures\Factory\State\WithNameInterface;
use Sylius\Bundle\CoreBundle\DataFixtures\Factory\State\WithPriorityInterface;
use Sylius\Component\Core\Model\PromotionInterface;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<PromotionInterface>
 *
 * @method static PromotionInterface|Proxy createOne(array $attributes = [])
 * @method static PromotionInterface[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static PromotionInterface|Proxy find(object|array|mixed $criteria)
 * @method static PromotionInterface|Proxy findOrCreate(array $attributes)
 * @method static PromotionInterface|Proxy first(string $sortedField = 'id')
 * @method static PromotionInterface|Proxy last(string $sortedField = 'id')
 * @method static PromotionInterface|Proxy random(array $attributes = [])
 * @method static PromotionInterface|Proxy randomOrCreate(array $attributes = [])
 * @method static PromotionInterface[]|Proxy[] all()
 * @method static PromotionInterface[]|Proxy[] findBy(array $attributes)
 * @method static PromotionInterface[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static PromotionInterface[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method PromotionInterface|Proxy create(array|callable $attributes = [])
 */
interface PromotionFactoryInterface extends WithCodeInterface, WithNameInterface, WithDescriptionInterface, WithPriorityInterface, WithChannelsInterface
{
    public function withUsageLimit(int $usageLimit): self;

    public function couponBased(): self;

    public function notCouponBased(): self;

    public function exclusive(): self;

    public function notExclusive(): self;

    public function withStartDate(\DateTimeInterface|string $startAt): self;

    public function withEndDate(\DateTimeInterface|string $endAt): self;

    public function withRules(array $rules): self;

    public function withActions(array $actions): self;

    public function withCoupons(array $coupons): self;
}
