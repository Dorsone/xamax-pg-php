<?php

namespace Xamax\PaymentGate\Exceptions;

use GuzzleHttp\Exception\TooManyRedirectsException;
use Throwable;

class RequestToManyRedirectsException extends RequestException
{
    public function __construct(
        protected TooManyRedirectsException $exception,
        string                     $message = "",
        int                        $code = 0,
        ?Throwable                 $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
    }
}