<?php
/**
 * Created by PhpStorm.
 * User: matthieuparis
 * Date: 04/12/2018
 * Time: 20:45
 */

namespace Src\Entity;


use Fork\Renderer\Output;
use Fork\Service\Game;
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

    public function win(GameGrid $grid, Output $output)
    {
        if ($this->verifAlign($grid, $output) == true)
        {
            return true;
        }
        elseif ($this->verifVertical($grid, $output)==true)
        {
            return true;
        }
        else{


        return false;}
    }

    public function verifAlign(GameGrid $grid, Output $output)
    {
        $winR=0;
        $winG=0;
        $location=$grid->getGrid();

        for ($i=0; $i<=sizeof($grid->getGrid()); $i++)
        {
            for ($x=1; $x<=7; $x++)
            {
                for ($y=1; $y<=6; $y++)
                {
                        // var_dump($location[$i] == array($x=>array($y=>$x.','.$y.',R')));
                    if ($location[$i] == array($x=>array($y=>$x.','.$y.',R')))
                    {
                        $winR++;
                        $winG = 0;
                        if($winR == 4)
                        {
                            break 3;
                        }
                    }
                    elseif ($location[$i] == array($x=>array($y=>$x.','.$y.',G')))
                    {
                        $winG++;
                        $winR = 0;
                        if($winG == 4)
                        {
                            break 3;
                        }
                    }
                    else
                    {
                        $winG=0;
                        $winR=0;
                    }

                    $i++;


                }
            }
        }

        if($winR>=4)
            {
                $output->writeLine("Partie terminée, rouge gagne par alignement horizontal");
                return true;
            }
            elseif ($winG>=4)
            {
                $output->writeLine("Partie terminée, vert gagne par alignement horizontal");
                return true;
            }
            else
            {

                return false;
            }
        }

    public function verifVertical(GameGrid $grid, Output $output)
    {
        $w=0;
        $winR=0;
        $winG=0;
        $location=$grid->getGrid();


        for ($y=1; $y<=7; $y++)
        {
            $w=($y-1);

            for ($x=1; $x<=6; $x++)
            {

                    if ($location[$w] == array($x=>array($y=>$x.','.$y.',R')))
                    {
                        $winR++;
                        $winG = 0;
                    if($winR == 4)
                        {
                            break 2;
                        }
                    }
                    elseif ($location[$w] == array($x=>array($y=>$x.','.$y.',G')))
                    {
                        $winG++;
                        $winR = 0;
                        if($winG == 4)
                        {
                            break 2;
                        }
                    }
                    else
                    {
                        $winG=0;
                        $winR=0;
                    }
                    $w=$w+7;

        }
        }
        if($winR>=4)
        {
            $output->writeLine("Partie terminée, rouge gagne par alignement vertical");
            return true;
        }
        elseif ($winG>=4)
        {
            $output->writeLine("Partie terminée, vert gagne par alignement vertical");
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @param GameGrid $grid
     * @return bool|string
     */
    public function verifDiagLeft(GameGrid $grid, Output $output)
    {
        $winR=0;
        $winG=0;
        $diagx=2;
        $diagy=2;

        foreach ($grid->getGrid() as $lign) {
            foreach ($lign as $l) {
                for ($i = 1; $i <= 7; $i++) {
                    for ($y = 1; $y < 6; $y++) {
                        if($l[$i] == $i . ',' . $y . 'R'){
                            for ($w=$diagx; $diagx<7; $diagx++)
                            {
                                if ($l[$diagx] == $diagx.','.$diagy.'R')
                                {
                                    $winR++;
                                    $winG=0;
                                    $diagy++;
                                    if($winR == 4)
                                    {
                                        break 5;
                                    }
                                }

                        }
                        }
                        if ($l[$i] == $i . ',' . $y . 'G') {
                            for ($w=$diagx; $diagx<7; $diagx++)
                            {
                                if ($l[$w] == $w.','.$diagy.'R')
                                {
                                    $winG++;
                                    $winR=0;
                                    $diagy++;
                                    if($winG == 4)
                                    {
                                        break 5;
                                    }
                                }

                            }
                        }

                    }
                }
            }
        }
        if($winR>=4)
        {
            $output->writeLine("Partie terminée, rouge gagne");
            return true;
        }
        elseif ($winG>=4)
        {
            $output->writeLine("Partie terminée, vert gagne");
            return true;
        }
        else
        {
            return false;
        }
    }

    public function verifDiagRight(GameGrid $grid, Output $output)
    {
        $winR=0;
        $winG=0;
        $diagx=6;
        $diagy=2;

        foreach ($grid->getGrid() as $lign) {
            foreach ($lign as $l) {
                for ($i = 7; $i <= 1; $i--) {
                    for ($y = 1; $y < 6; $y++) {
                        if($l[$i] == $i . ',' . $y . 'R'){
                            for ($w=$diagx; $diagx>1; $diagx--)
                            {
                                if ($l[$diagx] == $diagx.','.$diagy.'R')
                                {
                                    $winR++;
                                    $winG=0;
                                    $diagy++;
                                    if($winR == 4)
                                    {
                                        break 5;
                                    }
                                }

                            }
                        }

                        if ($l[$i] == $i . ',' . $y . 'G') {
                            for ($w=$diagx; $diagx>1; $diagx--)
                            {
                                if ($l[$w] == $w.','.$diagy.'R')
                                {
                                    $winG++;
                                    $winR=0;
                                    $diagy++;
                                    if($winG == 4)
                                    {
                                        break 5;
                                    }
                                }

                            }
                        }

                    }
                }
            }
        }
        if($winR>=4)
        {
            $output->writeLine("Partie terminée, rouge gagne");
            return true;
        }
        elseif ($winG>=4)
        {
            $output->writeLine("Partie terminée, vert gagne");
            return true;
        }
        else
        {
            return false;
        }
    }




}