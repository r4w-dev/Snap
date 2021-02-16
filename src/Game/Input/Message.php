<?php declare(strict_types=1);

namespace R4w\Snap\Game\Input;

use R4w\Snap\Game\Entity\Player;

interface Message
{
    public function isSnap(): bool;

    public function getPlayerId(): string;
}
