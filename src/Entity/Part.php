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
    protected $player1;
    protected $player2;
    protected $grid;

    /**
     * Part constructor.
     * @param array $players
     * @param $grid
     */
    public function __construct(Player $player1, Player $player2, GameGrid $grid)
    {
        $this->player1 = $player1;
        $this->player2= $player2;
        $this->grid = $grid;
    }

    /**
     * @return Player
     */
    public function getPlayer1()
    {
        return $this->player1;
    }

    /**
     * @param Player $player1
     */
    public function setPlayer1($player1)
    {
        $this->player1 = $player1;
    }

    /**
     * @return Player
     */
    public function getPlayer2()
    {
        return $this->player2;
    }

    /**
     * @param Player $player2
     */
    public function setPlayer2($player2)
    {
        $this->player2 = $player2;
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

    public function randPlayer(): int
    {
        $number = rand(1,2);

        return $number;
    }




}