<?php

use Xamax\PaymentGate\Enums\ApiEndpointEnum;
use Xamax\PaymentGate\XamaxConnection;
use function PHPUnit\Framework\assertArrayHasKey;
use function PHPUnit\Framework\assertIsArray;

const TOKEN = 'test token';

test('get() method testing', function () {
    $connection = XamaxConnection::create(TOKEN, true);

    $response = $connection->get(ApiEndpointEnum::TRANSACTIONS_LIST);

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

test('post() method testing', function () {
    $connection = XamaxConnection::create(TOKEN, true);

    $response = $connection->post(ApiEndpointEnum::TRANSACTION_CREATE, [
        "transaction_id" => rand(1000000, 9999999999),
        "payment_method" => "credit_card",
        "amount" => 10,
        "country" => "THA",
        "currency" => "USD",
        "description" => "Payment name"
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
