<?php
/**
 * Created by PhpStorm.
 * User: matthieuparis
 * Date: 02/12/2018
 * Time: 10:59
 */
declare(strict_types=1);


namespace Fork\Service;

use Fork\Renderer\Output;
final class GameGrid
{
    private $x=7;
    private $y=6;
    private $grid;
    private $output;


    /**
     * GameGrid constructor.
     */
    public function __construct(Output $output)
    {
        $output->writeLine(sprintf("Initialisation de la grille en 7 colonnes et 6 lignes."));
        $this->output = $output;
        $this->x = 7;
        $this->y = 6;
        $this->grid = [];
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param mixed $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param mixed $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @return array
     */
    public function getGrid()
    {
        return $this->grid;
    }

    /**
     * @param array $grid
     */
    public function setGrid($grid)
    {
        $this->grid = $grid;
    }

    /**
     * @return Output
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param Output $output
     */
    public function setOutput($output)
    {
        $this->output = $output;
    }


    public function run(): Output
    {
        $this->init();

        return $this->output;
    }

    public function init()
    {

        $this->getOutput();
        $gameGrid= [];

        for ($i=1; $i<7; $i++)
        {
            for ($w=1; $w<8; $w++)
            {
                array_push($gameGrid, array($i => array($w => $i.",".$w)));

            }
        }
        //var_dump($gameGrid);
        $this->setGrid($gameGrid);


        //return $this->grid;

    }


}