<?php

namespace djstarcom\BookingComSDK\Models;

use stdClass;

/**
 * @package djstarcom\BookingComSDK\Models
 */
class HotelAvailability extends Model
{
    /**
     * @var int
     */
    protected $hotel_id;

    /**
     * @var string
     */
    protected $hotel_name;

    /**
     * @var string
     */
    protected $stars;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var stdClass
     */
    protected $location;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var array
     */
    protected $rooms;

    /**
     * @var array
     */
    protected $hotel_amenities;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var string
     */
    protected $hotel_currency_code;

    /**
     * @var stdClass
     */
    protected $checkin_time;

    /**
     * @var string
     */
    protected $default_language;

    /**
     * @var string
     */
    protected $postcode;

    /**
     * @var stdClass
     */
    protected $cheapest_breakfast_rate;

    /**
     * @return int|null|string
     */
    public function getPrimaryKey()
    {
        return $this->hotel_id;
    }

    /**
     * Unique ID to represent this hotel.
     * @return int
     */
    public function getHotelId(): int
    {
        return $this->hotel_id;
    }

    /**
     * The name of the hotel
     * @return string
     */
    public function getHotelName(): ?string
    {
        return $this->hotel_name;
    }

    /**
     * The star rating of the hotel.
     * @return string
     */
    public function getStars(): ?string
    {
        return $this->stars;
    }

    /**
     * The country that the hotel is located in.
     * @return string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * Latitude and longitude of the hotel. Controlled by a setting.
     * @return object
     */
    public function getLocation(): ?stdClass
    {
        return $this->location;
    }

    /**
     * The address of the hotel.
     * @return string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * Group of rooms
     * @return array
     */
    public function getRooms(): ?array
    {
        return $this->rooms;
    }

    /**
     * Amenities that are available at this hotel
     * @return array
     */
    public function getHotelAmenities(): ?array
    {
        return $this->hotel_amenities;
    }

    /**
     * The display price of the room in this hotel.
     * @return float
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * The currency code of the hotel's currency.
     * @return string
     */
    public function getHotelCurrencyCode(): ?string
    {
        return $this->hotel_currency_code;
    }

    /**
     * The time that the hotel accept guests checking in.
     * @return object
     */
    public function getCheckinTime(): ?stdClass
    {
        return $this->checkin_time;
    }

    /**
     * The default language of the hotel.
     * @return string
     */
    public function getDefaultLanguage(): ?string
    {
        return $this->default_language;
    }

    /**
     * The postcode or zipcode of the hotel.
     * @return string
     */
    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    /**
     * The minimum price of the room, and other room associated information.
     * @return object
     */
    public function getCheapestBreakfastRate(): ?stdClass
    {
        return $this->cheapest_breakfast_rate;
    }

    /**
     * @return array
     */
    protected function getAttributeMap(): array
    {
        return [
            'hotel_id'                => 'integer',
            'hotel_name'              => 'string',
            'stars'                   => 'string',
            'country'                 => 'string',
            'location'                => 'object',
            'address'                 => 'string',
            'rooms'                   => 'array',
            'hotel_amenities'         => 'array',
            'price'                   => 'float',
            'hotel_currency_code'     => 'string',
            'checkin_time'            => 'object',
            'default_language'        => 'string',
            'postcode'                => 'string',
            'cheapest_breakfast_rate' => 'object',
        ];
    }
}
