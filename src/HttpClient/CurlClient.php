<?php

namespace DJStarCOM\BookingComSDK\HttpClient;

use Curl\Curl;
use DJStarCOM\BookingComSDK\Exceptions\HttpClientException;
use ErrorException;

/**
 * Class HttpClient
 * @package DJStarCOM\BookingComSDK\HttpClient
 */
class CurlClient implements HttpClientInterface
{
    /**
     * @var Curl
     */
    private $instance;

    /**
     * CurlClient constructor.
     * @throws ErrorException
     */
    public function __construct()
    {
        $this->instance = new Curl();
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $data
     * @return array|string|null
     * @throws HttpClientException
     */
    public function call(string $method, string $url, array $data)
    {
        \call_user_func([$this->instance, $method], $url, $data);

        if ($this->instance->error) {
            $message = $this->instance->errorMessage;
            if ($this->instance->response && property_exists($this->instance->response, 'errors')) {
                $message .= '. ' . reset($this->instance->response->errors)->message;
            }

            throw new HttpClientException($message, $this->instance->errorCode);
        }

        return $this->instance->response;
    }

    /**
     * @param string $login
     * @param string $password
     */
    public function setBasicAuthentication(string $login, string $password): void
    {
        $this->instance->setBasicAuthentication($login, $password);
    }

    /**
     * @param int $timeout
     */
    public function setTimeout(int $timeout): void
    {
        $this->instance->setTimeout($timeout);
    }
}
