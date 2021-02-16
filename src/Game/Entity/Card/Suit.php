<?php

declare(strict_types=1);

namespace R4w\Snap\Game\Entity\Card;

/**
 * The intention of this class is to be a value object and provide a simple way to add additional suits.
 * @package R4w\Snap\Game\Entity\Card
 */
class Suit
{
    public const VALID_SUITS = [
        'Clubs',
        'Diamonds',
        'Hearts',
        'Spades',
    ];

    private string $suit;

    public function __construct(string $suit)
    {
        if (!in_array($suit, self::VALID_SUITS)) {
            throw new \InvalidArgumentException('Invalid suit.');
        }
        $this->suit = $suit;
    }

    public function __toString(): string
    {
        return $this->suit;
    }

    public function equalTo(Suit $suit): bool
    {
        return $this->suit === $suit->__toString();
    }
}
