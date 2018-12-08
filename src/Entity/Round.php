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
    private $id;

    /**
     * Round constructor.
     * @param $part
     */
    public function __construct(Player $player1, Player $player2, GameGrid $grid, Part $part, int $id)
    {
        parent::__construct($player1,$player2, $grid);
        $this->part = $part;
        $this->id= $id;
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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



    public function round(int $number, Player $player1, Player $player2, GameGrid $grid, Team $red, Team $green)
    {
        if ($number == 1)
        {
            $this->playFirst($player1, $grid, $red, $green);
        }
        else{
            $this->playSecond($player2, $grid, $red, $green);
        }
    }

    public function playFirst(Player $player1, GameGrid $grid, Team $red, Team $green)
    {
        if ($red->getPlayer() == $player1)
        {
            $pawn = new Pawn(rand(1,7),rand(1,6),$player1,$red);
        }
        else
        {
            $pawn = new Pawn(rand(1,7),rand(1,6),$player1,$green);
        }
         $pawn->verifPawn($pawn, $grid);
    }

    public function playSecond(Player $player2, GameGrid $grid, Team $red, Team $green)
    {
        if ($red->getPlayer() == $player2)
        {
            $pawn = new Pawn(rand(1,7),rand(1,6),$player2,$red);
        }
        else
        {
            $pawn = new Pawn(rand(1,7),rand(1,6),$player2,$green);
        }
        $pawn->verifPawn($pawn, $grid);
    }




}