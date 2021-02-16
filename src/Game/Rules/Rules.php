<?php

declare(strict_types=1);

namespace R4w\Snap\Game\Rules;

use R4w\Snap\Game\Entity\Card;
use R4w\Snap\Game\Entity\Player;

abstract class Rules
{
    protected const MAX_PLAYERS = 4;
    protected const MIN_PLAYERS = 2;

    protected const MAX_DECKS = 4;
    protected const MIN_DECKS = 1;

    protected int $roundLimit;

    public function __construct(int $roundLimit)
    {
        $this->roundLimit = $roundLimit;
    }

    public function isRoundLimit(int $turns, int $playerCount): bool
    {
        return ($turns % $playerCount === 0 && ($turns / $playerCount) >= $this->roundLimit);
    }

    abstract public function isSnapValid(Card $currentCard, ?Card $previousCard): bool;

    public function validateDeckCount(int $decks): void
    {
        if ($decks < static::MIN_DECKS && $decks > static::MAX_DECKS) {
            throw new \InvalidArgumentException(
                sprintf('Number of decks must be between %d and %d.', static::MIN_DECKS, static::MAX_DECKS)
            );
        }
    }

    public function valideatPlayerCount(int $players): void
    {
        if ($players < static::MIN_PLAYERS && $players > static::MAX_PLAYERS) {
            throw new \InvalidArgumentException(
                sprintf('Number of players must be between %d and %d.', static::MIN_PLAYERS, static::MAX_PLAYERS)
            );
        }
    }

    /**
     * @param Player[] $players
     * @return Player[].
     */
    public function winningPlayers(array $players): array
    {
        $winningCount = 0;
        $winners = [];
        foreach ($players as $player) {
            $handCount = $player->getHand()->count();
            if ($handCount < $winningCount) {
                continue;
            }
            if ($handCount === $winningCount) {
                $winners[] = $player;
            }
            $winners = [$player];
        }
        return $winners;
    }
}
