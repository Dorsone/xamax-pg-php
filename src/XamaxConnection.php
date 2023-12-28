<?php

namespace Xamax\PaymentGate;

use GuzzleHttp\Client;
use Throwable;
use Xamax\PaymentGate\Enums\ApiEndpointEnum;
use Xamax\PaymentGate\Enums\ConfigEnum;
use Xamax\PaymentGate\Enums\RequestMethodEnum;
use Xamax\PaymentGate\Exceptions\RequestException;
use Xamax\PaymentGate\Exceptions\RequestExceptionHandler;

class XamaxConnection
{
    protected Client $connection;

    public function __construct(
        protected string $token,
        protected bool   $sandbox = false
    )
    {
        $url = $this->sandbox ? ConfigEnum::SANDBOX_URL->value : ConfigEnum::URL->value;

        $this->connection = new Client([
            'base_uri' => $url,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ]
        ]);
    }

    public static function create(string $token, bool $sandbox = false): static
    {
        return new static($token, $sandbox);
    }

    /**
     * @param RequestMethodEnum $method
     * @param ApiEndpointEnum $uri
     * @param array $body
     * @return array
     * @throws RequestException
     */
    protected function request(RequestMethodEnum $method, ApiEndpointEnum $uri, array $body = []): array
    {
        try {
            $response = $this->connection->request($method->value, $uri->value, $body);
        } catch (Throwable $exception) {
            RequestExceptionHandler::handle($exception)->throw();
        }

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @param ApiEndpointEnum $uri
     * @param array $body
     * @return array
     * @throws RequestException
     */
    public function get(ApiEndpointEnum $uri, array $body = []): array
    {
        return $this->request(RequestMethodEnum::GET, $uri, ['query' => $body]);
    }

    /**
     * @param ApiEndpointEnum $uri
     * @param array $body
     * @return array
     * @throws RequestException
     */
    public function post(ApiEndpointEnum $uri, array $body = []): array
    {
        return $this->request(RequestMethodEnum::POST, $uri, ['form_params' => $body]);
    }
}