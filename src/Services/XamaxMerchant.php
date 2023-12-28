<?php

namespace Xamax\PaymentGate\Services;

use Xamax\PaymentGate\Enums\ApiEndpointEnum;
use Xamax\PaymentGate\Exceptions\RequestException;

/**
 * Adapter for using Xamax Merchant management APIs
 * @docs https://api.xamax.io/fiat/#/Merchant
 *
 * @class XamaxMerchant
 */
class XamaxMerchant extends XamaxService
{
    /**
     * Method for getting the balance of authenticated merchant
     * @docs https://api.xamax.io/fiat/#/Merchant/MerchantBalanceController.getBalance
     *
     * @throws RequestException
     */
    public function getBalance(): array
    {
        return $this->connection->get(ApiEndpointEnum::MERCHANT_BALANCE);
    }
}