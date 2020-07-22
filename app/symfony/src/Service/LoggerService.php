<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

class LoggerService
{
    const LEVEL_ERROR = "ERROR";
    const LEVEL_NOTICE = "NOTICE";
    const LEVEL_INFO = "INFO";
    const LEVEL_DEBUG = "DEBUG";

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function alert(string $message): void
    {
        $this->logger->alert($message);
    }

    public function warning(string $message): void
    {
        $this->logger->warning($message);
    }

    public function error(string $message): void
    {
        $this->logger->error($message);
    }

    public function info(string $message): void
    {
        $this->logger->info($message);
    }

    public function log(string $level, string $message): void
    {
        $this->logger->log($level, $message);
    }
}