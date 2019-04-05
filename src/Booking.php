<?php

namespace djstarcom\BookingComSDK;

use djstarcom\BookingComSDK\HttpClient\HttpClientInterface;
use djstarcom\BookingComSDK\Models\Result;
use djstarcom\BookingComSDK\Query\Query;

/**
 * Class Booking
 * @package djstarcom\BookingComSDK
 */
class Booking
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * Booking constructor.
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param Query $query
     * @return Result
     * @throws Exceptions\BookingResponseException
     */
    public function query(Query $query): Result
    {
        $client = clone $this->httpClient;

        return $query->execute($client);
    }
}
