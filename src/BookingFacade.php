<?php

namespace djstarcom\BookingComSDK;

use djstarcom\BookingComSDK\HttpClient\CurlClient;
use djstarcom\BookingComSDK\Models\Result;
use djstarcom\BookingComSDK\Query\Query;
use ErrorException;

/**
 * Class BookingFacade
 * @package djstarcom\BookingComSDK
 */
class BookingFacade
{
    /**
     * @var CurlClient
     */
    private $httpClient;

    /**
     * BookingFacade constructor.
     * @param string $login
     * @param string $password
     * @param int $timeout
     * @throws ErrorException
     */
    public function __construct(string $login, string $password, int $timeout = 30)
    {
        $this->httpClient = new CurlClient();
        $this->httpClient->setBasicAuthentication($login, $password);
        $this->httpClient->setTimeout($timeout);
    }

    /**
     * @param Query $query
     * @return Result
     * @throws Exceptions\BookingResponseException
     */
    public function query(Query $query): Result
    {
        $booking = new Booking($this->httpClient);

        return $booking->query($query);
    }
}
