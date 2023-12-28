<?php

namespace Xamax\PaymentGate\Exceptions;

use GuzzleHttp\Exception\ServerException;
use Throwable;

class RequestServerException extends RequestException
{
    public function __construct(
        protected ServerException $exception,
        string                     $message = "",
        int                        $code = 0,
        ?Throwable                 $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
    }
}