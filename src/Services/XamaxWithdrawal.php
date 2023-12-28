<?php

namespace Xamax\PaymentGate\Services;

use Xamax\PaymentGate\DTOs\TransactionGetListFiltersDTO;
use Xamax\PaymentGate\DTOs\WithdrawalGetListFiltersDTO;
use Xamax\PaymentGate\Enums\ApiEndpointEnum;
use Xamax\PaymentGate\Enums\TransactionPaymentMethodEnum;
use Xamax\PaymentGate\Exceptions\RequestException;
use Xamax\PaymentGate\XamaxConnection;

/**
 * Adapter for using Xamax withdrawal management APIs
 * @docs https://api.xamax.io/fiat/#/Withdrawals
 *
 * @class XamaxWithdrawal
 */
class XamaxWithdrawal extends XamaxService
{
    /**
     * Method for getting the list of withdrawals
     * for authenticated user with given filters
     * @docs https://api.xamax.io/fiat/#/Withdrawals/WithdrawalsController.merchantWithdrawals
     *
     * @param WithdrawalGetListFiltersDTO $filters
     * @return array
     * @throws RequestException
     */
    public function getList(WithdrawalGetListFiltersDTO $filters = new WithdrawalGetListFiltersDTO()): array
    {
        return $this->connection->get(ApiEndpointEnum::WITHDRAWALS_LIST, $filters->toArray());
    }

    /**
     * Method for creating new withdrawal
     * @docs https://api.xamax.io/fiat/#/Withdrawals/WithdrawalsController.merchantWithdrawal
     *
     * @param float $amount
     * @param string $currency
     * @param string $bankAccountNumber
     * @param string $bankName
     * @param string $name
     * @param string $surname
     * @param string $phone
     * @param string|null $organisationName
     * @return array
     * @throws RequestException
     */
    public function create(
        float $amount,
        string $currency,
        string $bankAccountNumber,
        string $bankName,
        string $name,
        string $surname,
        string $phone,
        string $organisationName
    ): array
    {
        return $this->connection->post(ApiEndpointEnum::WITHDRAWAL_CREATE, [
            'amount'              => $amount,
            'currency'            => $currency,
            'bank_account_number' => $bankAccountNumber,
            'bank_name'           => $bankName,
            'name'                => $name,
            'surname'             => $surname,
            'organisation_name'   => $organisationName,
            'phone'               => $phone,
        ]);
    }
}