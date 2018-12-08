<?php
/**
 * Created by PhpStorm.
 * User: matthieuparis
 * Date: 02/12/2018
 * Time: 10:44
 */
declare(strict_types=1);


namespace Src\Entity;



use Fork\Service\GameGrid;

class Pawn
{
    private $x;
    private $y;
    private $player;
    private $team;

    /**
     * Pawn constructor.
     * @param $x
     * @param $y
     * @param $player
     */
    public function __construct($x, $y, Player $player, Team $team)
    {
        $this->x = $x;
        $this->y = $y;
        $this->player = $player;
        $this->team = $team;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @param int $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @param int $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @return Player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param Player $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }

    /**
     * @return Team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param Team $team
     */
    public function setTeam($team)
    {
        $this->team = $team;
    }

    public function verifPawn(Pawn $pawn, GameGrid $grid)
    {
        $x = [];
        $location = $grid->getGrid();
        $i = 1;
//var_dump($grid);
        foreach ($location as $loc) {
            foreach ($loc as $l)
            {
                if ($l[$pawn->getY()] == $pawn->getX().','.$pawn->getY())
                {
                    var_dump($l);
                    var_dump($pawn->getX());
                    var_dump($pawn->getY());
                }
            }
        }
    }






}