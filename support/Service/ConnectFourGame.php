<?php

declare(strict_types=1);

namespace Fork\Service;

use Fork\Entity\Connect4\Player;
use Fork\Renderer\Output;
use Fork\Service\GameGrid;
use Interop\Container\ContainerInterface;
use Src\Entity\Player as PlayerGame;
use Src\Entity\Round;
use Src\Entity\Team;
use Src\Entity\Part;

final class ConnectFourGame implements Game
{
    private $output;
    private $participants;
    /**
     * @var RandomValue
     */
    private $randomValueGenerator;

    public function __construct(Output $output, RandomValue $randomValueGenerator, Participant ...$participants)
    {
        $output->writeLine(sprintf('Initialisation du jeu avec %d participants.', count($participants)));
        $this->output = $output;
        array_walk($participants, function (Participant $participant) {
            if (!$participant instanceof Player) {
                throw new \RuntimeException(sprintf(
                    'Les participants doivent être des %s pour pouvoir jouer, au moins un de ceux fourni est un %s',
                    Player::class,
                    get_class($participant)
                ));
            }
        });
        $this->participants = $participants;
        $this->randomValueGenerator = $randomValueGenerator;
    }

    public function run(): Output
    {


        $this->selectFirstPlayer();
        $gamegrid = new GameGrid($this->output)  ;
        $gamegrid->run();
        $player1= new PlayerGame(1, "Player 1");
        $player2 = new PlayerGame(2, "Player 2");
        $red = new Team("red", $player1);
        $green = new Team("green", $player2);
        $this->output->writeLine("Choix aléatoire des équipes (rouge et jaune).");
        $part = new Part($player1, $player2, $gamegrid);
        $this->output->writeLine("Initialisation de la partie.");
        $debuts=$part->randPlayer();
        $this->output->writeLine("Choix aléatoire de l'identifiant du premier participant.");
        $round=new Round($player1, $player2, $gamegrid, $part,1);
        $round->round($debuts,$player1,$player2,$gamegrid,$red,$green);





        return $this->output;
    }

    private function selectFirstPlayer(): Player
    {
        $this->output->writeLine("Choix aléatoire de l'identifiant du premier participant");
        return new Player();
    }
}