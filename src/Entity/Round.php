<?php
/**
 * Created by PhpStorm.
 * User: matthieuparis
 * Date: 04/12/2018
 * Time: 20:51
 */

namespace Src\Entity;


use Fork\Service\GameGrid;

class Round extends Part
{
    private $part;

    /**
     * Round constructor.
     * @param $part
     */
    public function __construct(array $players, GameGrid $grid, Part $part)
    {
        parent::__construct($players, $grid);
        $this->part = $part;
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

    /**
     * @return Part
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * @param Part $part
     */
    public function setPart($part)
    {
        $this->part = $part;
    }




}