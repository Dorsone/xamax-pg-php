<?php

namespace Xamax\PaymentGate\DTOs;

abstract class AbstractBaseDTO
{
    public function toArray(): array
    {
        return array_filter(json_decode(json_encode($this), true));
    }
}