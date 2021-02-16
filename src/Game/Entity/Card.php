<?php

declare(strict_types=1);

namespace R4w\Snap\Game\Entity;

use R4w\Snap\Game\Entity\Card\Suit;
use R4w\Snap\Game\Entity\Card\Value;

class Card
{

    /**
     * @var Suit
     */
    private Suit $suit;

    /**
     * @var Value
     */
    private Value $value;

    public function __construct(Suit $suit, Value $value)
    {
        $this->suit = $suit;
        $this->value = $value;
    }

    /**
     * @return Suit
     */
    public function getSuit(): Suit
    {
        return $this->suit;
    }

    /**
     * @return Value
     */
    public function getValue(): Value
    {
        return $this->value;
    }

    public function isSameSuit(Card $card): bool
    {
        return $this->suit->equalTo($card->getSuit());
    }

    public function isSameValue(Card $card): bool
    {
        return $this->value->equalTo($card->getValue());
    }

    public function __toString()
    {
        return sprintf('the %s of %s.', $this->value, $this->suit);
    }
}
