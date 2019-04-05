<?php

namespace djstarcom\BookingComSDK\HttpClient;

/**
 * Interface HttpClientInterface
 * @package djstarcom\BookingComSDK\HttpClient
 */
interface HttpClientInterface
{
    /**
     * @param string $method
     * @param string $url
     * @param array $data
     * @return array|string|null
     */
    public function call(string $method, string $url, array $data);
}
