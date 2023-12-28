<?php

use Xamax\PaymentGate\DTOs\WithdrawalGetListFiltersDTO;
use Xamax\PaymentGate\Enums\WithdrawalPaymentTypeEnum;
use Xamax\PaymentGate\Enums\WithdrawalStatusEnum;
use Xamax\PaymentGate\Services\XamaxWithdrawal;
use Xamax\PaymentGate\XamaxConnection;
use function PHPUnit\Framework\assertArrayHasKey;
use function PHPUnit\Framework\assertIsArray;

test('getList() method testing', function () {
    $connection = XamaxConnection::create(TOKEN, true);

    $filters = new WithdrawalGetListFiltersDTO();

    $response = (new XamaxWithdrawal($connection))->getList($filters);

    $message = 'Invalid array structure';

    assertIsArray($response);
    assertArrayHasKey('withdrawals', $response, $message);
    assertIsArray($response['withdrawals'], $message);

    $data = $response['withdrawals'][0];

    assertIsArray($data, $message);

    assertArrayHasKey('withdrawal_id', $data, $message);
    assertArrayHasKey('created_at', $data, $message);
    assertArrayHasKey('status', $data, $message);
    assertArrayHasKey('amount', $data, $message);
    assertArrayHasKey('currency', $data, $message);
    assertArrayHasKey('payment_type', $data, $message);

    expect($data['withdrawal_id'])->toBeInt()
        ->and($data['created_at'])->toBeString()
        ->and($data['status'])->toBeIn(WithdrawalStatusEnum::values())
        ->and((float)$data['amount'])->toBeFloat()
        ->and($data['currency'])->toBeString()->toBeUppercase()
        ->and($data['payment_type'])->toBeIn([WithdrawalPaymentTypeEnum::bank_transfer->name]);
});

test('create() method testing', function () {
    $connection = XamaxConnection::create(TOKEN, true);

    $response = (new XamaxWithdrawal($connection))->create(...[
        'amount' => rand(1, 200),
        'currency' => 'NGN',
        'bankAccountNumber' => '42348012319239401',
        'bankName' => 'Bank Name',
        'name' => 'Test',
        'surname' => 'Last',
        'phone' => '+2341232323',
        'organisationName' => 'Test Org'
    ]);

    $message = 'Invalid array structure';

    assertIsArray($response);

    assertArrayHasKey('withdrawal_id',       $response, $message);
    assertArrayHasKey('amount',              $response, $message);
    assertArrayHasKey('currency',            $response, $message);
    assertArrayHasKey('bank_account_number', $response, $message);
    assertArrayHasKey('bank_name',           $response, $message);
    assertArrayHasKey('name',                $response, $message);
    assertArrayHasKey('surname',             $response, $message);
    assertArrayHasKey('organisation_name',   $response, $message);
    assertArrayHasKey('phone',               $response, $message);
    assertArrayHasKey('status',              $response, $message);
    assertArrayHasKey('date',                $response, $message);
});