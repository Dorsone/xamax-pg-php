<?php

namespace Xamax\PaymentGate\Enums;

enum ConfigEnum : string
{
    case URL = 'https://api.xamax.io/fiat/v1/';
    case SANDBOX_URL = 'http://127.0.0.1:3000/fiat/v1/';
}
