<?php
/**
 * Created by PhpStorm.
 * User: matthieuparis
 * Date: 02/12/2018
 * Time: 10:35
 */

namespace Src\Entity;

use Fork\Service\Participant;
use Src\Entity\Team;

final class Player implements Participant
{
    private $id;
    private $team;

    /**
     * Player constructor.
     * @param $id
     * @param $team
     */
    public function __construct(int $id, Team $team)
    {
        $this->id = $id;
        $this->team = $team;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param mixed $team
     */
    public function setTeam($team)
    {
        $this->team = $team;
    }


}