<?php

namespace Xamax\PaymentGate\Enums;

enum WithdrawalStatusEnum : string
{
    case pending = 'withdrawal_status_pending';
    case complete = 'withdrawal_status_confirmed';
    case failed = 'withdrawal_status_failed';
    case waiting = 'withdrawal_status_waiting';
    case canceled = 'withdrawal_status_canceled';

    public static function names(): array
    {
        return array_map(function (WithdrawalStatusEnum $status) {
            return $status->name;
        }, self::cases());
    }

    public static function values(): array
    {
        return array_map(function (WithdrawalStatusEnum $status) {
            return $status->value;
        }, self::cases());
    }
}
