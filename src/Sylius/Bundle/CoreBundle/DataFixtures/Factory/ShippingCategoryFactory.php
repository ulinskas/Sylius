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

use Sylius\Bundle\CoreBundle\DataFixtures\Factory\State\WithCodeTrait;
use Sylius\Bundle\CoreBundle\DataFixtures\Factory\State\WithDescriptionTrait;
use Sylius\Bundle\CoreBundle\DataFixtures\Factory\State\WithNameTrait;
use Sylius\Component\Core\Formatter\StringInflector;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Shipping\Model\ShippingCategory;
use Sylius\Component\Shipping\Model\ShippingCategoryInterface;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<ShippingCategoryInterface>
 *
 * @method static ShippingCategoryInterface|Proxy createOne(array $attributes = [])
 * @method static ShippingCategoryInterface[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static ShippingCategoryInterface|Proxy find(object|array|mixed $criteria)
 * @method static ShippingCategoryInterface|Proxy findOrCreate(array $attributes)
 * @method static ShippingCategoryInterface|Proxy first(string $sortedField = 'id')
 * @method static ShippingCategoryInterface|Proxy last(string $sortedField = 'id')
 * @method static ShippingCategoryInterface|Proxy random(array $attributes = [])
 * @method static ShippingCategoryInterface|Proxy randomOrCreate(array $attributes = [])
 * @method static ShippingCategoryInterface[]|Proxy[] all()
 * @method static ShippingCategoryInterface[]|Proxy[] findBy(array $attributes)
 * @method static ShippingCategoryInterface[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static ShippingCategoryInterface[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method ShippingCategoryInterface|Proxy create(array|callable $attributes = [])
 */
class ShippingCategoryFactory extends ModelFactory implements ShippingCategoryFactoryInterface, FactoryWithModelClassAwareInterface
{
    use WithCodeTrait;
    use WithNameTrait;
    use WithDescriptionTrait;

    private static ?string $modelClass = null;

    public function __construct(private FactoryInterface $shippingCategoryFactory)
    {
        parent::__construct();
    }

    public static function withModelClass(string $modelClass): void
    {
        self::$modelClass = $modelClass;
    }

    protected function getDefaults(): array
    {
        return [
            'code' => null,
            'name' => self::faker()->words(3, true),
            'description' => self::faker()->paragraph(),
        ];
    }

    protected function initialize(): self
    {
        return $this
            ->instantiateWith(function(array $attributes): ShippingCategoryInterface {
                $code = $attributes['code'] ?? StringInflector::nameToCode($attributes['name']);

                /** @var ShippingCategoryInterface $shippingCategory */
                $shippingCategory = $this->shippingCategoryFactory->createNew();

                $shippingCategory->setCode($code);
                $shippingCategory->setName($attributes['name']);
                $shippingCategory->setDescription($attributes['description']);

                return $shippingCategory;
            })
        ;
    }

    protected static function getClass(): string
    {
        return self::$modelClass ?? ShippingCategory::class;
    }
}