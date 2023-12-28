<?php

namespace Xamax\PaymentGate\Enums;

enum TransactionPaymentMethodEnum
{
    /** Payment Systems */
    case we_chat_pay;
    case ali_pay;
    case promptpay;


    /** E-wallets */
    case ovo_ewallet;
    case paymaya_ewallet;
    case grabpay_ewallet;
    case truemoney_ewallet;
    case go_pay_ewallet;
    case momo_ewallet;
    case zalo_ewallet;
    case gcash_ewallet;
    case ewallet;


    /** Cards */
    case bank_card;
    case credit_card;
    case debit_card;


    /** Others */
    case online_banking;
    case mobile_money;
    case cash;
    case agent;
    case qr_code;
    case virtual_account;
    case wire;
    case upi;
    case upi2;
    case cup;
    case  p2p;
}
