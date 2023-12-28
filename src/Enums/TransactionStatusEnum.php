<?php

namespace Xamax\PaymentGate\Enums;

enum TransactionStatusEnum : string
{
    case pending = 'transaction_status_pending';
    case complete = 'transaction_status_confirmed';
    case failed = 'transaction_status_failed';
    case waiting = 'transaction_status_waiting';
    case canceled = 'transaction_status_canceled';
    case approve_required = 'transaction_status_approve_required';
    case refund_required = 'transaction_status_refund_required';
    case refunded = 'transaction_status_refunded';
    case processing = 'transaction_status_processing';
    case expired = 'transaction_status_expired';
}
