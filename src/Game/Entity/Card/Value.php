<?php

declare(strict_types=1);

namespace R4w\Snap\Game\Entity\Card;

/**
 * The intention of this class is to be a value object and provide a simple way to add additional Values e.g. Joker.
 */
class Value
{
    public const VALID_VALUES = [
        'Ace',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        '10',
        'Jack',
        'Queen',
        'King',
    ];

    private string $value;

    public function __construct(string $value)
    {
        if (!in_array($value, self::VALID_VALUES)) {
            throw new \InvalidArgumentException('Invalid value.');
        }
        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function equalTo(Value $value): bool
    {
        return $this->value === $value->__toString();
    }
}
