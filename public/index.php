<?php

declare(strict_types=1);

use R4w\Snap\Game;
use R4w\Snap\Game\Rules\FaceOnly;

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

$rules = new FaceOnly(10);
$snap = new Game($rules, 3, 2);
