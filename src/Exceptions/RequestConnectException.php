<?php

namespace Xamax\PaymentGate\Exceptions;

use GuzzleHttp\Exception\ConnectException;
use Throwable;

class RequestConnectException extends RequestException
{
    public function __construct(
        protected ConnectException $exception,
        string                     $message = "",
        int                        $code = 0,
        ?Throwable                 $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
    }
}