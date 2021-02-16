<?php

declare(strict_types=1);

namespace R4w\Snap\Game\Input;

interface InputInterface
{
    public function readMessage(): Message;
}
