<?php
/**
 * Created by PhpStorm.
 * User: matthieuparis
 * Date: 02/12/2018
 * Time: 10:46
 */

namespace Src\Entity;


final class Red extends Pawn
{
    private $color;

    /**
     * Red constructor.
     * @param $team
     */
    public function __construct(int $x, int $y, Player $player, string $color)
    {
        parent::__construct($x, $y, $player);
        $this->color = "red";
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
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }




}