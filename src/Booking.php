<?php

namespace DJStarCOM\BookingComSDK;

use DJStarCOM\BookingComSDK\HttpClient\HttpClientInterface;
use DJStarCOM\BookingComSDK\Models\Result;
use DJStarCOM\BookingComSDK\Query\Query;

/**
 * Class Booking
 * @package DJStarCOM\BookingComSDK
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
