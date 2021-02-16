<?php

declare(strict_types=1);

namespace R4w\Snap\Game\Entity;

class Pile extends CardCollection
{

    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    public function addCardsToBottom(CardCollection $cards): void
    {
        $this->cards = array_merge($cards->toArray(), $this->toArray());
    }

    public function reset(): void
    {
        $this->cards = [];
    }
}
