<?php
/**
 * Created by PhpStorm.
 * User: matthieuparis
 * Date: 02/12/2018
 * Time: 10:44
 */
declare(strict_types=1);


namespace Src\Entity;



use Fork\Renderer\Output;
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

    /**
     * @param Pawn $pawn
     * @param GameGrid $grid
     * @return bool
     */
    public function verifPawn(Pawn $pawn, GameGrid $grid, Output $output): bool
    {
        if ($pawn->getTeam()->getName() == "red") {
            $color = "R";
        } else {
            $color = "G";
        }
        $y = $pawn->getY();
        $x = $pawn->getX();
        $location = $grid->getGrid();
        $r = null;

        if (in_array(array($pawn->getX() => array($pawn->getY() => $pawn->getX() . ',' . $pawn->getY())), $location) != false) {
            $value = false;
            $nb = 1;
            while ($value != true)
            {
                if (($y-$nb) >=0)
                {
                    if (in_array(array($pawn->getX() => array(($y-$nb) => $pawn->getX() . ',' . ($y-$nb))), $location) == true) {
                        if(($y-$nb) == 1)
                        {
                            $xy = ((($x-1)*7)+(($y-$nb)-1));
                            $location[$xy]= array($pawn->getX() => array((($y-$nb)) => $pawn->getX() . ',' . (($y-$nb)) . ',' . $color));
                            $grid->setGrid($location);
                            $output->writeLine("Le joueur ".$pawn->getPlayer()->getId()." joue dans la case ".$pawn->getX().",".(($y-$nb)));
                            $value=true;
                            break;
                        }
                        $nb++;
                    }
                    else
                    {

                        $xy = ((($x-1)*7)+(($y-$nb)));
                        $location[$xy]= array($pawn->getX() => array((($y-$nb)+1) => $pawn->getX() . ',' . (($y-$nb)+1) . ',' . $color));
                        $grid->setGrid($location);
                        $output->writeLine("Le joueur ".$pawn->getPlayer()->getId()." joue dans la case ".$pawn->getX().",".(($y-$nb)+1));

                        $value=true;
                        break;
                    }
                }
                else
                {
                    $value=true;

                }
            }
        } else {
            $value = false;
            $nb = 1;
            while ($value != true) {
                if ($y+$nb <=6)
                {
                    if (in_array(array($pawn->getX() => array($y+$nb => $pawn->getX() . ',' . ($y+$nb))), $location) == true) {
                        $nb++;
                    }
                    else
                    {
                        $xy = ((($x-1)*7)+(($y+$nb)-1));
                        $location[$xy]= array($pawn->getX() => array((($y+$nb)) => $pawn->getX() . ',' . (($y+$nb)) . ',' . $color));
                        $grid->setGrid($location);
                        $output->writeLine("Le joueur ".$pawn->getPlayer()->getId()." joue dans la case ".$pawn->getX().",".(($y+$nb)));

                        $value=true;
                        break;
                    }
            }
            else
            {
                $value=true;

            }
            }
        }
        return true;


    }
}