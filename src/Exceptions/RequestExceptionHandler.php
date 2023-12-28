<?php

namespace Xamax\PaymentGate\Exceptions;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\TooManyRedirectsException;
use Throwable;

class RequestExceptionHandler
{
    public function __construct(
        protected TooManyRedirectsException|ServerException|ClientException|ConnectException|Throwable $exception
    )
    {
    }

    public static function handle(Throwable $exception): static
    {
        return new static($exception);
    }

    /**
     * @return void
     * @throws RequestClientException
     * @throws RequestConnectException
     * @throws RequestException
     * @throws RequestServerException
     * @throws RequestToManyRedirectsException
     */
    public function throw(): void
    {
        throw match (true) {
            $this->exception instanceof ConnectException => throw new RequestConnectException($this->exception),
            $this->exception instanceof ClientException => throw new RequestClientException($this->exception),
            $this->exception instanceof ServerException => throw new RequestServerException($this->exception),
            $this->exception instanceof TooManyRedirectsException => throw new RequestToManyRedirectsException($this->exception),
            default => new RequestException($this->exception->getMessage())
        };
    }
}