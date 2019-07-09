<?php declare(strict_types=1);

namespace EdmondsCommerce\CriticalLogger;

use Psr\Log\LoggerInterface;

class CriticalLogger
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function log(string $message, \Throwable $throwable, array $context = []): void
    {
        $file = $throwable->getFile();
        $line = $throwable->getLine();

        $throwableDetails = "[file:$file][line:$line]";

        $this->logger->critical(
            $message . $throwableDetails,
            $context
        );
    }
}