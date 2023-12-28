<?php

namespace Xamax\PaymentGate\DTOs;

use Xamax\PaymentGate\Enums\TransactionPaymentMethodEnum;
use Xamax\PaymentGate\Enums\TransactionStatusEnum;

class TransactionGetListFiltersDTO extends AbstractBaseDTO
{
    public function __construct(
        public ?string $order_direction = null,
        public ?bool $order = null,
        public ?int $page = null,
        public ?int $per_page = null,
        public ?TransactionPaymentMethodEnum $payment_method = null,
        public ?TransactionStatusEnum $status = null,
        public ?float $since = null,
        public ?float $till = null,
        public ?string $currency = null
    )
    {
    }
}