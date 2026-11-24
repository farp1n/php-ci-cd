<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\LoggerInterface;

class FileLogger implements LoggerInterface
{
    public function __construct(
        private string $logFile = 'logs/app.log',
    ) {}

    public function log(string $message): void
    {
        $dir = dirname($this->logFile);
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $line = '['.date('Y-m-d H:i:s')."] [FILE] {$message}".PHP_EOL;
        file_put_contents($this->logFile, $line, FILE_APPEND);
    }
}
