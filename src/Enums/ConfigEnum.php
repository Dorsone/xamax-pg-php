<?php

namespace Xamax\PaymentGate\Enums;

enum ConfigEnum : string
{
    case URL = 'https://api.xamax.io/fiat/v1/';
    case SANDBOX_URL = 'https://api.sandbox.xamax.io/fiat/v1/';
}
