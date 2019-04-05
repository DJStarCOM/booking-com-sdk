<?php

namespace DJStarCOM\BookingComSDK\Query;

use DJStarCOM\BookingComSDK\Models\Hotel;

/**
 * Class HotelsQuery
 * @package DJStarCOM\BookingComSDK\Query
 */
class HotelsQuery extends Query
{
    public const EXTRAS_HOTEL_DESCRIPTION = 'hotel_description';
    public const EXTRAS_HOTEL_FACILITIES = 'hotel_facilities';
    public const EXTRAS_HOTEL_INFO = 'hotel_info';
    public const EXTRAS_HOTEL_PHOTOS = 'hotel_photos';
    public const EXTRAS_HOTEL_POLICIES = 'hotel_policies';
    public const EXTRAS_KEY_COLLECTION_INFO = 'key_collection_info';
    public const EXTRAS_PAYMENT_DETAILS = 'payment_details';
    public const EXTRAS_ROOM_DESCRIPTION = 'room_description';
    public const EXTRAS_ROOM_FACILITIES = 'room_facilities';
    public const EXTRAS_ROOM_INFO = 'room_info';
    public const EXTRAS_ROOM_PHOTOS = 'room_photos';

    /**
     * @var string
     */
    protected static $uri = '/hotels';

    /**
     * Limit the results to these cities.
     *
     * @var array
     */
    protected $city_ids;

    /**
     * Limit the results to these regions.
     *
     * @var array
     */
    protected $region_ids;

    /**
     * Limit the results to these country codes (cc1).
     *
     * @var array
     */
    protected $country_ids;

    /**
     * Limit the results to these districts.
     *
     * @var array
     */
    protected $district_ids;

    /**
     * Additional information available (via extras parameter) are:
     * hotel_description
     * hotel_facilities
     * hotel_info
     * hotel_photos
     * hotel_policies
     * key_collection_info
     * payment_details
     * room_description
     * room_facilities
     * room_info
     * room_photos
     *
     * @var array
     */
    protected $extras;

    /**
     * Limit the result to these hotels.
     *
     * @var array
     */
    protected $hotel_ids;

    /**
     * The language code to return the results in.
     *
     * @var string
     */
    protected $language;

    /**
     * Where in the resulting list to start. This can be used together with {rows} to get the data in parts.
     *
     * @var integer
     */
    protected $offset;

    /**
     * The maximum number of entries to return. This can be used together with {offset} to get the data in parts.
     *
     * @var integer
     */
    protected $rows;

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
     * @return $this
     */
    public function setCityIds(array $city_ids): self
    {
        $this->city_ids = $city_ids;

        return $this;
    }

    /**
     * @return array
     */
    public function getCountryIds(): ?array
    {
        return $this->country_ids;
    }

    /**
     * @param array $country_ids
     * @return $this
     */
    public function setCountryIds(array $country_ids): self
    {
        $this->country_ids = $country_ids;

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
     * @return $this
     */
    public function setDistrictIds(array $district_ids): self
    {
        $this->district_ids = $district_ids;

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
     * @return $this
     */
    public function setExtras(array $extras): self
    {
        $this->extras = $extras;

        return $this;
    }

    /**
     * @return self
     */
    public function withExtras(): self
    {
        $this->extras = [
            self::EXTRAS_HOTEL_DESCRIPTION,
            self::EXTRAS_HOTEL_FACILITIES,
            self::EXTRAS_HOTEL_INFO,
            self::EXTRAS_HOTEL_PHOTOS,
            self::EXTRAS_HOTEL_POLICIES,
            self::EXTRAS_KEY_COLLECTION_INFO,
            self::EXTRAS_PAYMENT_DETAILS,
            self::EXTRAS_ROOM_DESCRIPTION,
            self::EXTRAS_ROOM_FACILITIES,
            self::EXTRAS_ROOM_INFO,
            self::EXTRAS_ROOM_PHOTOS,
        ];

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
     * @return $this
     */
    public function setHotelIds(array $hotel_ids): self
    {
        $this->hotel_ids = $hotel_ids;

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
     * @return $this
     */
    public function setLanguage(string $language): self
    {
        $this->language = $language;

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
     * @return $this
     */
    public function setOffset(int $offset): self
    {
        $this->offset = $offset;

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
     * @return $this
     */
    public function setRows(int $rows): self
    {
        $this->rows = $rows;

        return $this;
    }

    /**
     * @return array
     */
    protected function getAttributeMap(): array
    {
        return [
            'city_ids'     => 'array',
            'region_ids'   => 'array',
            'country_ids'  => 'array',
            'district_ids' => 'array',
            'extras'       => 'array',
            'hotel_ids'    => 'array',
            'language'     => 'string',
            'offset'       => 'integer',
            'rows'         => 'integer',
        ];
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    protected function model(): string
    {
        return Hotel::class;
    }
}
