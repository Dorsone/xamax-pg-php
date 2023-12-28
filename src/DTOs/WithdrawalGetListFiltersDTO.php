<?php

namespace Xamax\PaymentGate\DTOs;

use Xamax\PaymentGate\Enums\WithdrawalPaymentTypeEnum;
use Xamax\PaymentGate\Enums\WithdrawalStatusEnum;

class WithdrawalGetListFiltersDTO extends AbstractBaseDTO
{
    public function __construct(
        public ?string $order_direction = null,
        public ?bool $order = null,
        public ?int $page = null,
        public ?int $per_page = null,
        public ?WithdrawalStatusEnum $status = null,
        public ?WithdrawalPaymentTypeEnum $payment_type = null,
        public ?float $since = null,
        public ?float $till = null,
        public ?string $currency = null
    )
    {
    }
}