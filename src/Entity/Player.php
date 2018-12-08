<?php
/**
 * Created by PhpStorm.
 * User: matthieuparis
 * Date: 02/12/2018
 * Time: 10:35
 */

namespace Src\Entity;

use Fork\Service\Output;
use Fork\Entity\Participant;
use Src\Entity\Team;

final class Player implements Participant
{
    private $id;
    private $name;

    /**
     * Player constructor.
     * @param $id
     * @param $team
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $team
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}