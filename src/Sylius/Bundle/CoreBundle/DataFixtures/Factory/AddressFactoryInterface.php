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

use Sylius\Bundle\CoreBundle\DataFixtures\Factory\State\WithCustomerInterface;
use Sylius\Bundle\CoreBundle\DataFixtures\Factory\State\WithFirstNameInterface;
use Sylius\Bundle\CoreBundle\DataFixtures\Factory\State\WithLastNameInterface;
use Sylius\Bundle\CoreBundle\DataFixtures\Factory\State\WithoutCustomerInterface;
use Sylius\Bundle\CoreBundle\DataFixtures\Factory\State\WithPhoneNumberInterface;
use Sylius\Component\Core\Model\AddressInterface;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<AddressInterface>
 *
 * @method static AddressInterface|Proxy createOne(array $attributes = [])
 * @method static AddressInterface[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static AddressInterface|Proxy find(object|array|mixed $criteria)
 * @method static AddressInterface|Proxy findOrCreate(array $attributes)
 * @method static AddressInterface|Proxy first(string $sortedField = 'id')
 * @method static AddressInterface|Proxy last(string $sortedField = 'id')
 * @method static AddressInterface|Proxy random(array $attributes = [])
 * @method static AddressInterface|Proxy randomOrCreate(array $attributes = [])
 * @method static AddressInterface[]|Proxy[] all()
 * @method static AddressInterface[]|Proxy[] findBy(array $attributes)
 * @method static AddressInterface[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static AddressInterface[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method AddressInterface|Proxy create(array|callable $attributes = [])
 */
interface AddressFactoryInterface extends WithCustomerInterface, WithoutCustomerInterface, WithFirstNameInterface, WithLastNameInterface, WithPhoneNumberInterface
{
    public function withCompany(string $company): self;

    public function withStreet(string $street): self;

    public function withCity(string $city): self;

    public function withPostcode(string $postcode): self;

    public function withCountryCode(string $countryCode): self;

    public function withProvinceName(string $provinceName): self;

    public function withProvinceCode(string $provinceCode): self;
}