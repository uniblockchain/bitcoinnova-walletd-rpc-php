
# Bitcoinnova RPC PHP

Bitcoinnova RPC PHP is a PHP wrapper for the Bitcoinnova JSON-RPC interfaces.

Requires Bitcoinnova v0.8.4+

---

1) [Install Bitcoinnova RPC PHP](#install-bitcoinnova-rpc-php)
1) [Examples](#examples)
1) [Docs](#docs)
1) [License](#license)

---

## Install Bitcoinnova RPC PHP

This package requires PHP >=7.1.3. Require this package with composer:

```
composer require BitcoinNova/bitcoinnova-rpc-php
```

## Examples

```php
use Bitcoinnova\Bitcoinnovad;

$config = [
    'rpcHost' => 'http://127.0.0.1',
    'rpcPort' => 45223,
];

$Bitcoinnovad = new Bitcoinnovad($config);
echo $Bitcoinnovad->getBlockCount();

> {"id":2,"jsonrpc":"2.0","result":{"count":784547,"status":"OK"}}
``` 

```php
use Bitcoinnova\Bitcoinnova-Service;

$config = [
    'rpcHost'     => 'http://127.0.0.1',
    'rpcPort'     => 8070,
    'rpcPassword' => 'test',
];

$Bitcoinnova-Service = new Bitcoinnova-Service($config);
echo $Bitcoinnova-Service->getBalance($walletAddress);

> {"id":0,"jsonrpc":"2.0","result":["availableBalance":100,"lockedAmount":50]}
``` 

Optionally, you may access details about the response:

```php
$response = $Bitcoinnova-Service->getBalance($walletAddress);

// The result field from the RPC response
$response->result();

// RPC response as JSON string
$response->toJson();

// RPC response as an array
$response->toArray();

// Or other response details
$response->getStatusCode();
$response->getProtocolVersion();
$response->getHeaders();
$response->hasHeader($header);
$response->getHeader($header);
$response->getHeaderLine($header);
$response->getBody();
``` 

## License

Bitcoinnova RPC PHP is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
