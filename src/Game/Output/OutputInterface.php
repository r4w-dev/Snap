<?php

declare(strict_types=1);

namespace R4w\Snap\Game\Input;

use R4w\Snap\Game\Entity\Player;

interface OutputInterface
{
    public function writeLn(string $line): void;

    /**
     * @param Player[] $winners
     */
    public function writeWinners(array $winners): void;
}
