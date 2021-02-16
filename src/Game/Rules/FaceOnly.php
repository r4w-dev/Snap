<?php

declare(strict_types=1);

namespace R4w\Snap\Game\Rules;

use R4w\Snap\Game\Entity\Card;

/**
 * I was uncertain as to wether face referred to face cards or face value...
 * I wrote it for face value as it is closer to the general rules of snap
 */
class FaceOnly extends Rules
{
    public function isSnapValid(Card $currentCard, ?Card $previousCard): bool
    {
        return $previousCard !== null && $currentCard->isSameValue($previousCard);
    }
}
