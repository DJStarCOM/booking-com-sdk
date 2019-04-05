<?php

namespace djstarcom\BookingComSDK\Query;

use DateTime;
use djstarcom\BookingComSDK\Models\HotelAvailability;

class HotelAvailabilityQuery extends Query
{
    public const ORDER_BY_DISTANCE = 'distance';
    public const ORDER_BY_POPULARITY = 'popularity';
    public const ORDER_BY_PRICE = 'price';
    public const ORDER_BY_RANKING = 'ranking';
    public const ORDER_BY_REVIEW_SCORE = 'review_score';
    public const ORDER_BY_STARS = 'stars';
    public const ORDER_DIRECTION_ASC = 'asc';
    public const ORDER_DIRECTION_DESC = 'desc';

    /**
     * @var string Shows cheapest breakfast rate for the hotel
     */
    public const EXTRAS_ADD_CHEAPEST_BREAKFAST_RATE = 'add_cheapest_breakfast_rate';

    /**
     * @var string Show amenities provided by hotel
     */
    public const EXTRAS_HOTEL_AMENITIES = 'hotel_amenities';

    /**
     * @var string Show extra hotel details
     */
    public const EXTRAS_HOTEL_DETAILS = 'hotel_details';

    /**
     * @var string Show payment terms like prepay or cancellation for the room
     */
    public const EXTRAS_PAYMENT_TERMS = 'payment_terms';

    /**
     * @var string Show amenities in the room
     */
    public const EXTRAS_ROOM_AMENITIES = 'room_amenities';

    /**
     * @var string Show extra room details
     */
    public const EXTRAS_ROOM_DETAILS = 'room_details';

    /**
     * @var string Show policies for the room
     */
    public const EXTRAS_ROOM_POLICIES = 'room_policies';

    /**
     * @var string Only show hotels that have a reception that's open 24 hours/day
     */
    public const FILTER_IS_24HR = 'is_24hr';

    /**
     * @var string Filter to show only no_cc properties in the response.
     */
    public const FILTER_NO_CC_FILTER = 'no_cc_filter';

    /**
     * @var string Do not show dormitory beds or rooms, or hotels that only have such rooms
     */
    public const FILTER_NO_DORMS = 'no_dorms';

    /**
     * This is used when debugging or when you are initially setting up your integration.
     * A test hotel can be used to test all of our endpoints including making a booking
     * @var string
     */
    public const FILTER_SHOW_TEST = 'show_test';

    public const ROOM_ADULT_GUEST = 'A';

    /**
     * @var string
     */
    protected static $uri = '/hotelAvailability';

    /**
     * Limit the result list to the specified cities. You can get the list of city_ids from cities.
     */
    protected $city_ids;

    /**
     * Limit the result list to the specified regions. You can get the list of region_ids form regions.
     */
    protected $region_ids;

    /**
     * Limit the result list to the specified districts. You can get the list of district_ids from districts.
     */
    protected $district_ids;

    /**
     * Limit the result list to the specified hotels where they have availability for the specified guests and dates.
     */
    protected $hotel_ids;

    /**
     * The arrival date. Must be within 360 days in the future and in the format yyyy-mm-dd.
     */
    protected $checkin;

    /**
     * The departure date. Must be later than {checkin}. Must be between 1 and 30 days after {checkin}.
     * Must be within 360 days in the future and in the format yyyy-mm-dd.
     */
    protected $checkout;

    /**
     * The maximum number of entries to return (less can and often are returned).
     * This can be used together with {offset} to paginate through results. The default number returned is 1000.
     * When requesting 1000, there can be less than 1000 rows returned, but this does not mean the end of the resultset,
     * instead you should keep paginating by increasing the offset by 1000 until you get a page with 0 results -
     * that is what signifies the end.
     * @var int
     */
    protected $rows;

    /**
     * This is the index of item you wish to use as the starting point for this page (when paginating).
     * Used together with {rows} for pagination. Eg. rows=1000&offset=0 will be first 1000 results.
     * rows=1000&offset=1000 will be the next 1000. You should continue to increment the offset to paginate,
     * and you should use the value of rows as the number you increase by each time.
     * @var int
     */
    protected $offset;

    /**
     * Show the results in this language. Note: only some cities are translated.
     * @var string
     */
    protected $language;

    /**
     * Returns the price in this currency
     * @var string
     */
    protected $currency;

    /**
     * The way to order your results. (distance, popularity, price, ranking, review_score, stars)
     * @var string
     */
    protected $order_by;

    /**
     * The direction you wish for your order_by parameter to be ordered in.
     * Possible values are order_dir=asc for ascending or order_dir=desc for descending
     * @var string
     */
    protected $order_dir;

    /**
     * Returns extra results mentioned in this.
     *
     * Additional information available (via extras parameter) are:
     * add_cheapest_breakfast_rate: Shows cheapest breakfast rate for the hotel
     * hotel_amenities: Show amenities provided by hotel
     * hotel_details: Show extra hotel details
     * payment_terms: Show payment terms like prepay or cancellation for the room
     * room_amenities: Show amenities in the room
     * room_details: Show extra room details
     * room_policies: Show policies for the room
     *
     * @var array
     */
    protected $extras;

    /**
     * Limit the result list to the items satisfying the specified rules
     *
     * Available options to filter the output (via options parameter) are:
     * is_24hr: Only show hotels that have a reception that's open 24 hours/day
     * no_cc_filter: Filter to show only no_cc properties in the response. Added in version 2.1.
     * no_dorms: Do not show dormitory beds or rooms, or hotels that only have such rooms
     * show_test: This is used when debugging or when you are initially setting up your integration.
     * @var array
     */
    protected $filter;

    /**
     * A comma separated array of guests to stay in this room where "A" represents an adult and an integer
     * represents a child. eg room1=A,A,4 would be a room with 2 adults and 1 four year-old child.
     * Child age numbers are 0..17.
     * Similar parameters available for up to 30 rooms - room1..room30.
     */
    protected $room1;
    protected $room2;
    protected $room3;
    protected $room4;
    protected $room5;
    protected $room6;
    protected $room7;
    protected $room8;
    protected $room9;
    protected $room10;
    protected $room11;
    protected $room12;
    protected $room13;
    protected $room14;
    protected $room15;
    protected $room16;
    protected $room17;
    protected $room18;
    protected $room19;
    protected $room20;
    protected $room21;
    protected $room22;
    protected $room23;
    protected $room24;
    protected $room25;
    protected $room26;
    protected $room27;
    protected $room28;
    protected $room29;
    protected $room30;

    /**
     * @return bool
     */
    public function isSecure(): bool
    {
        return false;
    }

    /**
     * @return array
     */
    public function getCityIds(): ?array
    {
        return $this->city_ids;
    }

    /**
     * @param array $city_ids
     * @return self
     */
    public function setCityIds(array $city_ids): self
    {
        $this->city_ids = $city_ids;

        return $this;
    }

    /**
     * @return array
     */
    public function getRegionIds(): ?array
    {
        return $this->region_ids;
    }

    /**
     * @param array $region_ids
     * @return self
     */
    public function setRegionIds(array $region_ids): self
    {
        $this->region_ids = $region_ids;

        return $this;
    }

    /**
     * @return array
     */
    public function getDistrictIds(): ?array
    {
        return $this->district_ids;
    }

    /**
     * @param array $district_ids
     * @return self
     */
    public function setDistrictIds(array $district_ids): self
    {
        $this->district_ids = $district_ids;

        return $this;
    }

    /**
     * @return array
     */
    public function getHotelIds(): ?array
    {
        return $this->hotel_ids;
    }

    /**
     * @param array $hotel_ids
     * @return self
     */
    public function setHotelIds(array $hotel_ids): self
    {
        $this->hotel_ids = $hotel_ids;

        return $this;
    }

    /**
     * @return string
     */
    public function getCheckin(): ?string
    {
        return $this->checkin;
    }

    /**
     * @param DateTime $checkin
     * @return self
     */
    public function setCheckin(DateTime $checkin): self
    {
        $this->checkin = $checkin->format('Y-m-d');

        return $this;
    }

    /**
     * @return string
     */
    public function getCheckout(): ?string
    {
        return $this->checkout;
    }

    /**
     * @param DateTime $checkout
     * @return self
     */
    public function setCheckout(DateTime $checkout): self
    {
        $this->checkout = $checkout->format('Y-m-d');

        return $this;
    }

    /**
     * @return int
     */
    public function getRows(): ?int
    {
        return $this->rows;
    }

    /**
     * @param int $rows
     * @return self
     */
    public function setRows(int $rows): self
    {
        $this->rows = $rows;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return self
     */
    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom1(): ?array
    {
        return $this->room1;
    }

    /**
     * @param array $room1
     * @return self
     */
    public function setRoom1(array $room1): self
    {
        $this->room1 = $room1;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom2(): ?array
    {
        return $this->room2;
    }

    /**
     * @param array $room2
     * @return self
     */
    public function setRoom2(array $room2): self
    {
        $this->room2 = $room2;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom3(): ?array
    {
        return $this->room3;
    }

    /**
     * @param array $room3
     * @return self
     */
    public function setRoom3(array $room3): self
    {
        $this->room3 = $room3;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom4(): ?array
    {
        return $this->room4;
    }

    /**
     * @param array $room4
     * @return self
     */
    public function setRoom4(array $room4): self
    {
        $this->room4 = $room4;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom5(): ?array
    {
        return $this->room5;
    }

    /**
     * @param array $room5
     * @return self
     */
    public function setRoom5(array $room5): self
    {
        $this->room5 = $room5;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom6(): ?array
    {
        return $this->room6;
    }

    /**
     * @param array $room6
     * @return self
     */
    public function setRoom6(array $room6): self
    {
        $this->room6 = $room6;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom7(): ?array
    {
        return $this->room7;
    }

    /**
     * @param array $room7
     * @return self
     */
    public function setRoom7(array $room7): self
    {
        $this->room7 = $room7;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom8(): ?array
    {
        return $this->room8;
    }

    /**
     * @param array $room8
     * @return self
     */
    public function setRoom8(array $room8): self
    {
        $this->room8 = $room8;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom9(): ?array
    {
        return $this->room9;
    }

    /**
     * @param array $room9
     * @return self
     */
    public function setRoom9(array $room9): self
    {
        $this->room9 = $room9;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom10(): ?array
    {
        return $this->room10;
    }

    /**
     * @param array $room10
     * @return self
     */
    public function setRoom10(array $room10): self
    {
        $this->room10 = $room10;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom11(): ?array
    {
        return $this->room11;
    }

    /**
     * @param array $room11
     * @return self
     */
    public function setRoom11(array $room11): self
    {
        $this->room11 = $room11;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom12(): ?array
    {
        return $this->room12;
    }

    /**
     * @param array $room12
     * @return self
     */
    public function setRoom12(array $room12): self
    {
        $this->room12 = $room12;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom13(): ?array
    {
        return $this->room13;
    }

    /**
     * @param array $room13
     * @return self
     */
    public function setRoom13(array $room13): self
    {
        $this->room13 = $room13;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom14(): ?array
    {
        return $this->room14;
    }

    /**
     * @param array $room14
     * @return self
     */
    public function setRoom14(array $room14): self
    {
        $this->room14 = $room14;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom15(): ?array
    {
        return $this->room15;
    }

    /**
     * @param array $room15
     * @return self
     */
    public function setRoom15(array $room15): self
    {
        $this->room15 = $room15;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom16(): ?array
    {
        return $this->room16;
    }

    /**
     * @param array $room16
     * @return self
     */
    public function setRoom16(array $room16): self
    {
        $this->room16 = $room16;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom17(): ?array
    {
        return $this->room17;
    }

    /**
     * @param array $room17
     * @return self
     */
    public function setRoom17(array $room17): self
    {
        $this->room17 = $room17;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom18(): ?array
    {
        return $this->room18;
    }

    /**
     * @param array $room18
     * @return self
     */
    public function setRoom18(array $room18): self
    {
        $this->room18 = $room18;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom19(): ?array
    {
        return $this->room19;
    }

    /**
     * @param array $room19
     * @return self
     */
    public function setRoom19(array $room19): self
    {
        $this->room19 = $room19;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom20(): ?array
    {
        return $this->room20;
    }

    /**
     * @param array $room20
     * @return self
     */
    public function setRoom20(array $room20): self
    {
        $this->room20 = $room20;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom21(): ?array
    {
        return $this->room21;
    }

    /**
     * @param array $room21
     * @return self
     */
    public function setRoom21(array $room21): self
    {
        $this->room21 = $room21;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom22(): ?array
    {
        return $this->room22;
    }

    /**
     * @param array $room22
     * @return self
     */
    public function setRoom22(array $room22): self
    {
        $this->room22 = $room22;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom23(): ?array
    {
        return $this->room23;
    }

    /**
     * @param array $room23
     * @return self
     */
    public function setRoom23(array $room23): self
    {
        $this->room23 = $room23;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom24(): ?array
    {
        return $this->room24;
    }

    /**
     * @param array $room24
     * @return self
     */
    public function setRoom24(array $room24): self
    {
        $this->room24 = $room24;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom25(): ?array
    {
        return $this->room25;
    }

    /**
     * @param array $room25
     * @return self
     */
    public function setRoom25(array $room25): self
    {
        $this->room25 = $room25;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom26(): ?array
    {
        return $this->room26;
    }

    /**
     * @param array $room26
     * @return self
     */
    public function setRoom26(array $room26): self
    {
        $this->room26 = $room26;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom27(): ?array
    {
        return $this->room27;
    }

    /**
     * @param array $room27
     * @return self
     */
    public function setRoom27(array $room27): self
    {
        $this->room27 = $room27;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom28(): ?array
    {
        return $this->room28;
    }

    /**
     * @param array $room28
     * @return self
     */
    public function setRoom28(array $room28): self
    {
        $this->room28 = $room28;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom29(): ?array
    {
        return $this->room29;
    }

    /**
     * @param array $room29
     * @return self
     */
    public function setRoom29(array $room29): self
    {
        $this->room29 = $room29;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoom30(): ?array
    {
        return $this->room30;
    }

    /**
     * @param array $room30
     * @return self
     */
    public function setRoom30(array $room30): self
    {
        $this->room30 = $room30;

        return $this;
    }

    /**
     * @return array
     */
    public function getExtras(): ?array
    {
        return $this->extras;
    }

    /**
     * @param array $extras
     * @return self
     */
    public function setExtras(array $extras): self
    {
        $this->extras = $extras;

        return $this;
    }

    public function withExtras()
    {
        $this->extras = [
            self::EXTRAS_ADD_CHEAPEST_BREAKFAST_RATE,
            self::EXTRAS_HOTEL_AMENITIES,
            self::EXTRAS_HOTEL_DETAILS,
            self::EXTRAS_PAYMENT_TERMS,
            self::EXTRAS_ROOM_AMENITIES,
            self::EXTRAS_ROOM_DETAILS,
            self::EXTRAS_ROOM_POLICIES,
        ];

        return $this;
    }

    /**
     * @return int
     */
    public function getOffset(): ?int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     * @return self
     */
    public function setOffset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return self
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderBy(): ?string
    {
        return $this->order_by;
    }

    /**
     * @param string $order_by
     * @return self
     */
    public function setOrderBy(string $order_by): self
    {
        $this->order_by = $order_by;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderDir(): ?string
    {
        return $this->order_dir;
    }

    /**
     * @param string $order_dir
     * @return self
     */
    public function setOrderDir(string $order_dir): self
    {
        $this->order_dir = $order_dir;

        return $this;
    }

    /**
     * @return array
     */
    public function getFilter(): ?array
    {
        return $this->filter;
    }

    /**
     * @param array $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->filter = $filter;

        return $this;
    }

    protected function getAttributeMap(): array
    {
        return [
            'city_ids'     => 'array',
            'region_ids'   => 'array',
            'district_ids' => 'array',
            'hotel_ids'    => 'array',
            'checkin'      => 'string',
            'checkout'     => 'string',
            'rows'         => 'integer',
            'offset'       => 'integer',
            'language'     => 'string',
            'currency'     => 'string',
            'order_by'     => 'string',
            'order_dir'    => 'string',
            'extras'       => 'array',
            'filter'       => 'array',
            'room1'        => 'array',
            'room2'        => 'array',
            'room3'        => 'array',
            'room4'        => 'array',
            'room5'        => 'array',
            'room6'        => 'array',
            'room7'        => 'array',
            'room8'        => 'array',
            'room9'        => 'array',
            'room10'       => 'array',
            'room11'       => 'array',
            'room12'       => 'array',
            'room13'       => 'array',
            'room14'       => 'array',
            'room15'       => 'array',
            'room16'       => 'array',
            'room17'       => 'array',
            'room18'       => 'array',
            'room19'       => 'array',
            'room20'       => 'array',
            'room21'       => 'array',
            'room22'       => 'array',
            'room23'       => 'array',
            'room24'       => 'array',
            'room25'       => 'array',
            'room26'       => 'array',
            'room27'       => 'array',
            'room28'       => 'array',
            'room29'       => 'array',
            'room30'       => 'array',
        ];
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    protected function model(): string
    {
        return HotelAvailability::class;
    }

}
