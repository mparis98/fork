<?php

declare(strict_types=1);

use Fork\Factory;
use Fork\Renderer;
use Fork\Service;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'games' => [
        'connect4' => Service\ConnectFourGame::class,
        ],
    'service_manager' => [
        'factories' => [
            Renderer\Output::class => Factory\Renderer\Output::class,
            Service\ConnectFourGame::class => Factory\Service\ConnectFourGame::class,
            Service\GameGrid::class =>Factory\Service\GameGrid::class,

            // InvokableFactory can be used when the service does not need any constructor argument
            Service\PseudoRandomValue::class => InvokableFactory::class,
        ],
        'aliases' => [
            Service\RandomValue::class => Service\PseudoRandomValue::class,
        ],
    ]
];