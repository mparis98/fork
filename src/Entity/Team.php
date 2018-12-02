<?php
/**
 * Created by PhpStorm.
 * User: matthieuparis
 * Date: 02/12/2018
 * Time: 10:37
 */

namespace Src\Entity;


final class Team
{
    private $name;
    private $player;

    /**
     * Team constructor.
     * @param $name
     * @param $player
     */
    public function __construct(string $name, Player $player)
    {
        $this->name = $name;
        $this->player = $player;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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