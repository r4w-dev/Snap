<?php

declare(strict_types=1);

namespace R4w\Snap;

use R4w\Snap\Game\Entity\Deck;
use R4w\Snap\Game\Entity\Pile;
use R4w\Snap\Game\Entity\Player;
use R4w\Snap\Game\Input\InputInterface;
use R4w\Snap\Game\Input\OutputInterface;
use R4w\Snap\Game\Rules\Rules;

class Game
{
    /** @var Pile */
    private Pile $drawPile;

    /** @var int */
    private int $playerCount;

    /** @var Player[] */
    private array $players;

    /** @var Rules */
    private Rules $rules;

    private int $turn = 0;

    public function __construct(Rules $rules, int $decks, int $playerCount)
    {
        $this->rules = $rules;
        $this->rules->validateDeckCount($decks);
        $this->rules->valideatPlayerCount($playerCount);
        $this->playerCount = $playerCount;
        $this->createPlayers();
        $this->buildDrawPile($decks);
    }

    private function buildDrawPile(int $decks): void
    {
        $this->drawPile = new Pile();
        for ($i = 1; $i < $decks; $i++) {
            $this->drawPile->addCards(new Deck());
        }
        $this->drawPile->shuffle();
    }

    private function createPlayers(): void
    {
        for ($i = 1; $i <= $this->playerCount; $i++) {
            $identifier = 'Player ' . $i;
            $this->players[$identifier] = new Player($identifier, new Pile());
        }
    }

    private function currentPlayer(): Player
    {
        return $this->players[$this->turn % $this->playerCount];
    }

    private function deal(): void
    {
        while ($this->drawPile->count() > $this->playerCount) {
            foreach ($this->players as $player) {
                $card = $this->drawPile->dealCard();
                $player->getHand()->addCard($card);
            }
        }
    }

    public function start(InputInterface $input, OutputInterface $output): void
    {
        $pile = new Pile();
        $previous = null;
        while (!$this->rules->isRoundLimit($this->turn, $this->playerCount) && $this->currentPlayer()->hasCards()) {
            $current = $this->currentPlayer()->getHand()->dealCard();
            $pile->addCard($current);
            $this->turn++;
            $output->writeLn(sprintf('The played card is %s does a player wish to call snap? [continue]', $current));
            $message = $input->readMessage();
            if ($message->isSnap() && $this->rules->isSnapValid($current, $previous)) {
                $this->handleSnap($message->getPlayerId(), $pile);
            }
        }
        $winners = $this->rules->winningPlayers($this->players);
        $output->writeWinners($winners);
    }

    private function handleSnap(string $playerId, Pile $pile): void
    {
        if (!array_key_exists($playerId, $this->players)) {
            return;
        }
        $this->players[$playerId]->getHand()->addCardsToBottom($pile);
        $pile->reset();
    }
}
