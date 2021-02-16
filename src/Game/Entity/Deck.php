<?php

declare(strict_types=1);

namespace R4w\Snap\Game\Entity;

use R4w\Snap\Game\Entity\Card\Suit;
use R4w\Snap\Game\Entity\Card\Value;

class Deck extends CardCollection
{
    public function __construct()
    {
        foreach (Value::VALID_VALUES as $value) {
            foreach (Suit::VALID_SUITS as $suit) {
                $this->cards[] = new Card(new Suit($suit), new Value($value));
            }
        }
    }
}
