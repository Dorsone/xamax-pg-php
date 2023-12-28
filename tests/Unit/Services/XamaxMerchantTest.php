<?php

use Xamax\PaymentGate\Services\XamaxMerchant;
use Xamax\PaymentGate\XamaxConnection;
use function PHPUnit\Framework\assertArrayHasKey;
use function PHPUnit\Framework\assertIsArray;

test('getBalance() method testing', function () {
    $connection = XamaxConnection::create(TOKEN, true);
    $response = (new XamaxMerchant($connection))->getBalance();

    assertIsArray($response);
    assertArrayHasKey('balances', $response);
    assertIsArray($response['balances']);
    $data = $response['balances'][0];

    assertIsArray($data);
    assertArrayHasKey('status', $data);
    assertArrayHasKey('amount', $data);
    assertArrayHasKey('currency', $data);

    expect($data['status'])->toBeString()->toBeIn(['pending', 'failed', 'complete', 'processing', 'expired', 'processed'])
        ->and((float) $data['amount'])
        ->toBeFloat()->and($data['currency'])->toBeString()->toBeUppercase();
});