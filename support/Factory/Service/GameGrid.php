<?php
/**
 * Created by PhpStorm.
 * User: matthieuparis
 * Date: 02/12/2018
 * Time: 11:42
 */
declare(strict_types=1);

namespace Fork\Factory\Service;

use Interop\Container\ContainerInterface;
use Fork\Renderer\Output;
use Zend\ServiceManager\Factory\FactoryInterface;
use Fork\Service\GameGrid as Grid;

final class GameGrid implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): Grid
    {
        return new Grid(
            $container->get(Output::class)
        );
    }

}