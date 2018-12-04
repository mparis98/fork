<?php
/**
 * Created by PhpStorm.
 * User: matthieuparis
 * Date: 04/12/2018
 * Time: 20:45
 */

namespace Src\Entity;


use Fork\Service\GameGrid;

class Part
{
    protected $players = [];
    protected $grid;

    /**
     * Part constructor.
     * @param array $players
     * @param $grid
     */
    public function __construct(array $players, GameGrid $grid)
    {
        $this->players = $players;
        $this->grid = $grid;
    }

    /**
     * @return array
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @param array $players
     */
    public function setPlayers($players)
    {
        $this->players = $players;
    }

    /**
     * @return GameGrid
     */
    public function getGrid()
    {
        return $this->grid;
    }

    /**
     * @param GameGrid $grid
     */
    public function setGrid($grid)
    {
        $this->grid = $grid;
    }




}