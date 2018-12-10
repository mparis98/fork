<?php
/**
 * Created by PhpStorm.
 * User: matthieuparis
 * Date: 04/12/2018
 * Time: 20:51
 */
declare(strict_types=1);

namespace Src\Entity;


use Fork\Renderer\Output;
use Fork\Service\GameGrid;

final class Round extends Part
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
    public function getPlayer1(): Player
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
    public function getPlayer2(): Player
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
    public function getGrid(): GameGrid
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
    public function getPart(): Part
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
    public function getId(): int
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



    public function round(int $number, Player $player1, Player $player2, GameGrid $grid, Team $red, Team $green, Output $output)
    {
        if ($number == 1)
        {
            $this->playFirst($player1, $grid, $red, $green, $output);
            $this->playSecond($player2, $grid, $red, $green, $output);

        }
        else{
            $this->playSecond($player2, $grid, $red, $green, $output);
            $this->playFirst($player1, $grid, $red, $green, $output);
        }
    }

    public function playFirst(Player $player1, GameGrid $grid, Team $red, Team $green, Output $output)
    {
        if ($red->getPlayer()->getId() == $player1->getId())
        {
            $pawn = new Pawn(rand(1,6),rand(1,7),$player1,$red);
        }
        else
        {
            $pawn = new Pawn(rand(1,6),rand(1,7),$player1,$green);
        }
         $pawn->verifPawn($pawn, $grid, $output);
    }

    public function playSecond(Player $player2, GameGrid $grid, Team $red, Team $green, Output $output)
    {
        if ($red->getPlayer()->getId() == $player2->getId())
        {
            $pawn = new Pawn(rand(1,6),rand(1,7),$player2,$red);
        }
        else
        {
            $pawn = new Pawn(rand(1,6),rand(1,7),$player2,$green);
        }
        $pawn->verifPawn($pawn, $grid, $output);
    }
}