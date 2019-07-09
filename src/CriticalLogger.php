<?php declare(strict_types=1);

namespace EdmondsCommerce\CriticalLogger;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class CriticalLogger
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var string
     */
    private $uri;
    /**
     * @var string
     */
    private $host;

    public function __construct(LoggerInterface $logger, RequestStack $requestStack)
    {
        $this->logger = $logger;

        $request    = $requestStack->getCurrentRequest();
        $this->uri  = $request->getRequestUri();
        $this->host = $request->getHttpHost();
    }

    public function log(string $message, \Throwable $throwable, array $context = []): void
    {
        $type = get_class($throwable);
        $file = $throwable->getFile();
        $line = $throwable->getLine();

        $throwableDetails = "[host:{$this->host}][uri:{$this->uri}][type:$type][file:$file][line:$line] ";

        $this->logger->critical(
            $throwableDetails . $message,
            $context
        );
    }
}