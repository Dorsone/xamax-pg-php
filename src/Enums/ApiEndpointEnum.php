<?php

namespace Xamax\PaymentGate\Enums;

enum ApiEndpointEnum : string
{
    case TRANSACTION_CREATE = 'transaction';
    case TRANSACTIONS_LIST = 'transactions';
    case WITHDRAWAL_CREATE = 'withdrawal';
    case WITHDRAWALS_LIST = 'withdrawals';
    case MERCHANT_BALANCE = 'merchant/balance';
}
