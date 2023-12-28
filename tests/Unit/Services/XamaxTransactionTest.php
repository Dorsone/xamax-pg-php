<?php

use Xamax\PaymentGate\DTOs\TransactionGetListFiltersDTO;
use Xamax\PaymentGate\Enums\TransactionPaymentMethodEnum;
use Xamax\PaymentGate\Services\XamaxTransaction;
use Xamax\PaymentGate\XamaxConnection;
use function PHPUnit\Framework\assertArrayHasKey;
use function PHPUnit\Framework\assertIsArray;

test('getList() method testing', function () {
    $connection = XamaxConnection::create(TOKEN, true);

    $filters = new TransactionGetListFiltersDTO();

    $response = (new XamaxTransaction($connection))->getList($filters);

    $message = 'Invalid array structure';

    assertIsArray($response);
    assertArrayHasKey('transactions', $response, $message);
    assertIsArray($response['transactions'], $message);

    $data = $response['transactions'][0];

    assertIsArray($data, $message);

    assertArrayHasKey('id',                  $data, $message);
    assertArrayHasKey('merchant_id',         $data, $message);
    assertArrayHasKey('amount',              $data, $message);
    assertArrayHasKey('amount_charged',      $data, $message);
    assertArrayHasKey('transaction_id',      $data, $message);
    assertArrayHasKey('status',              $data, $message);
    assertArrayHasKey('description',         $data, $message);
    assertArrayHasKey('currency',            $data, $message);
    assertArrayHasKey('rate_merchant_final', $data, $message);
    assertArrayHasKey('created_at',          $data, $message);
    assertArrayHasKey('payment_method',      $data, $message);
});

test('create() method testing', function () {
    $connection = XamaxConnection::create(TOKEN, true);

    $response = (new XamaxTransaction($connection))->create(...[
        "transaction_id" => rand(1000000, 9999999999),
        "payment_method" => TransactionPaymentMethodEnum::credit_card,
        "amount" => 10,
        "country" => "THA",
        "currency" => "USD",
        "description" => "Payment name",
        "success_redirect_url" => "",
        "fail_redirect_url" => ""
    ]);

    $message = 'Invalid array structure';

    assertIsArray($response);
    assertArrayHasKey('type', $response, $message);
    assertArrayHasKey('value', $response, $message);
    expect($response['type'])->toBeString()->toBe('link');

    $data = $response['value'];

    assertIsArray($data, $message);
    assertArrayHasKey('link', $data, $message);
    expect($data['link'])->toBeString()->toBeUrl();
});