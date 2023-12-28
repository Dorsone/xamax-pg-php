## PHP Xamax PaymentGate API

#### Library for working with Xamax PaymentGate API

## Installation

To get the latest version of `Xamax PaymentGate API`, simply require the project using [Composer](https://getcomposer.org)

```bash
composer require dorsone/xamax-pg-php
```

Instead, you may of course manually update your require block and run `composer update` if you so choose:

```json
{
  "require": {
    "dorsone/xamax-pg-php": "^1.0"
  }
}
```

## Using

### 1) Create a new connection with Xamax PaymentGate
```php
use Xamax\PaymentGate\XamaxConnection;

$connection = XamaxConnection::create('your api token')
```
> <b> Warning: </b> As a second parameter of create() method you can specify environment, if it will be ```true```, you will work with <b> sandbox </b>

#### After connection, you can easily work with our API

### 2) There are 3 services for working with transactions, withdrawals and merchants
#### For example for working with transactions you need to do
```php
use Xamax\PaymentGate\Services\XamaxTransaction;

$transaction = new XamaxTransaction($connection) // $connection variable is the connection that we created on step 1

/** And we need to get the list of transactions */
$transaction->getList()
```
#### Also, there is a filters
```php
use Xamax\PaymentGate\DTOs\TransactionGetListFiltersDTO;
use Xamax\PaymentGate\Enums\TransactionPaymentMethodEnum;

$filters = new TransactionGetListFiltersDTO();

$filters->currency = 'USD';
$filters->payment_method = TransactionPaymentMethodEnum::credit_card

$transaction->getList($filters);
```

#### This is the basic usage of our library