<?php

namespace Xamax\PaymentGate\Enums;

enum RequestMethodEnum: string
{
    case GET = 'GET';
    case POST = 'POST';
    case DELETE = 'DELETE';
    case PUT = 'PUT';
    case PATCH = 'PATCH';
}
