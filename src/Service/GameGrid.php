<?php
/**
 * Created by PhpStorm.
 * User: matthieuparis
 * Date: 02/12/2018
 * Time: 11:42
 */

namespace Src\Service;

use Interop\Container\ContainerInterface;
use Fork\Renderer\Output;
use Src\Entity\GameGrid as Grid;
use Zend\ServiceManager\Factory\FactoryInterface;

final class GameGrid implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): Grid
    {
        return new Grid(
            $container->get(Output::class)
        );
    }

}