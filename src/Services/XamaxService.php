<?php

namespace Xamax\PaymentGate\Services;

use Xamax\PaymentGate\XamaxConnection;

abstract class XamaxService
{
    public function __construct(protected XamaxConnection $connection) {}
}