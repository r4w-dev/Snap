<?php

declare(strict_types=1);

spl_autoload_register(static function ($class) {
    $prefix = 'R4w\\Snap';
    if (strpos($class, $prefix) !== 0) {
        return;
    }
    $file = str_replace('\\', DIRECTORY_SEPARATOR, substr($class, strlen($prefix)));
    $fileRoot = __DIR__ . DIRECTORY_SEPARATOR . 'src';
    if (file_exists($fileRoot . $file . '.php')) {
        require_once $fileRoot . $file . '.php';
    }
});
