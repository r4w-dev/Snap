<?php

declare(strict_types=1);

namespace R4w\Snap\Game\Rules;

use R4w\Snap\Game\Entity\Card;

class SuitOrFace extends Rules
{
    public function isSnapValid(Card $currentCard, ?Card $previousCard): bool
    {
        return $previousCard !== null && (
                $currentCard->isSameSuit($previousCard) ||
                $currentCard->isSameValue($previousCard)
            );
    }
}
