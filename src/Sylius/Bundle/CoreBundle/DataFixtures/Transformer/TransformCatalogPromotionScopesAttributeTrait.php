<?php

declare(strict_types=1);

namespace Sylius\Bundle\CoreBundle\DataFixtures\Transformer;

use Psr\EventDispatcher\EventDispatcherInterface;
use Sylius\Bundle\CoreBundle\DataFixtures\Event\CreateResourceEvent;
use Sylius\Bundle\CoreBundle\DataFixtures\Factory\CatalogPromotionScopeFactoryInterface;

trait TransformCatalogPromotionScopesAttributeTrait
{
    private EventDispatcherInterface $eventDispatcher;

    private function transformScopesAttribute(array $attributes): array
    {
        $scopes = [];
        foreach ($attributes['scopes'] as $scope) {
            if (\is_array($scope)) {
                /** @var CreateResourceEvent $event */
                $event = $this->eventDispatcher->dispatch(new CreateResourceEvent(CatalogPromotionScopeFactoryInterface::class, $scope));

                $scope = $event->getResource();
            }

            $scopes[] = $scope;
        }

        $attributes['scopes'] = $scopes;

        return $attributes;
    }
}