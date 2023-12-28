<?php

namespace Xamax\PaymentGate\Exceptions;

use GuzzleHttp\Exception\ClientException;
use Throwable;

class RequestClientException extends RequestException
{
    public function __construct(
        protected ClientException $exception,
        string                     $message = "",
        int                        $code = 0,
        ?Throwable                 $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
    }
}