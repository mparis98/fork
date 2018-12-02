<?php
/**
 * Created by PhpStorm.
 * User: matthieuparis
 * Date: 02/12/2018
 * Time: 10:44
 */

namespace Src\Entity;


class Pawn
{
    protected $x;
    protected $y;
    protected $player;

    /**
     * Pawn constructor.
     * @param $x
     * @param $y
     * @param $player
     */
    public function __construct(int $x, int $y, Player $player)
    {
        $this->x = $x;
        $this->y = $y;
        $this->player = $player;
    }

    /**
     * @return int
     */
    public function getX()
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
    public function getY()
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




}