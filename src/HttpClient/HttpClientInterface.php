<?php

namespace DJStarCOM\BookingComSDK\HttpClient;

/**
 * Interface HttpClientInterface
 * @package DJStarCOM\BookingComSDK\HttpClient
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
