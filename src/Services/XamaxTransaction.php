<?php

namespace Xamax\PaymentGate\Services;

use Xamax\PaymentGate\DTOs\TransactionGetListFiltersDTO;
use Xamax\PaymentGate\Enums\ApiEndpointEnum;
use Xamax\PaymentGate\Enums\TransactionPaymentMethodEnum;
use Xamax\PaymentGate\Exceptions\RequestException;

/**
 * Adapter for using Xamax transaction management APIs
 * @docs https://api.xamax.io/fiat/#/Transactions
 *
 * @class XamaxTransaction
 */
class XamaxTransaction extends XamaxService
{

    /**
     * Method for getting the list of transaction
     * for authenticated user with given filters
     * @docs https://api.xamax.io/fiat/#/Transactions/TransactionController.getTransactions
     *
     * @param TransactionGetListFiltersDTO $filters
     * @return array
     * @throws RequestException
     */
    public function getList(TransactionGetListFiltersDTO $filters = new TransactionGetListFiltersDTO()): array
    {
        return $this->connection->get(ApiEndpointEnum::TRANSACTIONS_LIST, $filters->toArray());
    }

    /**
     * Method for creating new transaction
     * @docs https://api.xamax.io/fiat/#/Transactions/TransactionController.createTransaction
     *
     * @param string $transaction_id
     * @param TransactionPaymentMethodEnum $payment_method
     * @param float $amount
     * @param string $country
     * @param string $currency
     * @param string $description
     * @param string $success_redirect_url
     * @param string $fail_redirect_url
     * @return array
     * @throws RequestException
     */
    public function create(
        string $transaction_id,
        TransactionPaymentMethodEnum $payment_method,
        float $amount,
        string $country,
        string $currency,
        string $description = '',
        string $success_redirect_url = '',
        string $fail_redirect_url = ''
    ): array
    {
        return $this->connection->post(ApiEndpointEnum::TRANSACTION_CREATE, [
            "transaction_id" => $transaction_id,
            "payment_method" => $payment_method->name,
            "amount" => $amount,
            "country" => $country,
            "currency" => $currency,
            "description" => $description,
            "success_redirect_url" => $success_redirect_url,
            "fail_redirect_url" => $fail_redirect_url
        ]);
    }
}