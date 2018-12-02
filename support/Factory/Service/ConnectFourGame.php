<?php

declare(strict_types=1);

namespace Fork\Factory\Service;

use Interop\Container\ContainerInterface;
use Fork\Renderer\Output;
use Fork\Service\ConnectFourGame as ConnectFourInstance;
use Fork\Service\RandomValue;
use Zend\ServiceManager\Factory\FactoryInterface;

final class ConnectFourGame implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ConnectFourInstance
    {
        return new ConnectFourInstance(
            $container->get(Output::class),
            $container->get(RandomValue::class),
            ...$container->get('participants')
        );
    }
}