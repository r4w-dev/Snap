<?php

declare(strict_types=1);

namespace R4w\Snap\Game\Entity;

class Player
{

    private Pile $hand;

    private string $identifier;

    public function __construct(string $identifier, Pile $hand)
    {
        $this->identifier = $identifier;
        $this->hand = $hand;
    }

    public function getHand(): Pile
    {
        return $this->hand;
    }

    public function hasCards(): bool
    {
        return $this->hand->count() === 0;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }
}
