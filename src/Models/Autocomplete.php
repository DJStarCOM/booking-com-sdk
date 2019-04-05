<?php

namespace DJStarCOM\BookingComSDK\Models;

class Autocomplete extends Model
{
    public const TYPE_AIRPORT = 'airport';
    public const TYPE_CITY = 'city';
    public const TYPE_DISTRICT = 'district';
    public const TYPE_HOTEL = 'hotel';
    public const TYPE_LANDMARK = 'landmark';
    public const TYPE_REGION = 'region';
    public const TYPE_THEME = 'theme';

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $nr_dest;

    /**
     * @var string
     */
    protected $latitude;

    /**
     * @var array
     */
    protected $forecast;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $city_name;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var array
     */
    protected $top_destinations;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $country_name;

    /**
     * @var int
     */
    protected $nr_hotels;

    /**
     * @var string
     */
    protected $timezone;

    /**
     * @var string
     */
    protected $longitude;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var array
     */
    protected $endorsements;

    /**
     * @var string
     */
    protected $city_ufi;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var int
     */
    protected $right_to_left;

    /**
     * @var string
     */
    protected $region;

    /**
     * Name of this destination.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Number of destinations for this theme.
     */
    public function getNrDest(): ?int
    {
        return $this->nr_dest;
    }

    /**
     * Latitude of the point considered to be the centre of the destination. E.g. centre of the city.
     * @return mixed
     */
    public function getLatitude(): string
    {
        return $this->latitude;
    }

    /**
     * Today's forecast for this location.
     * @return mixed
     */
    public function getForecast(): ?array
    {
        return $this->forecast;
    }

    /**
     * Booking.com landing page for this destination, with added affiliate id (aid) that you may pass as
     * the affiliate_id=... param.
     * @return mixed
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * City name for destination that is located inside a city.
     * @return mixed
     */
    public function getCityName(): string
    {
        return $this->city_name;
    }

    /**
     * The id of this destination or theme. Its value is used in searches by the accompanying destination type
     * (just 'type' in the output). E.g. if the destination type is 'city', then this value can be used
     * in a city_ids=... param.
     * @return mixed
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Showed for destinations only. An array of destinations and themes that represent search results.
     */
    public function getTopDestinations(): ?array
    {
        return $this->top_destinations;
    }

    /**
     * Country code of the destination.
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * Country name for this destination.
     */
    public function getCountryName(): string
    {
        return $this->country_name;
    }

    /**
     * Number of hotels that are open and bookable hotels for this destination.
     */
    public function getNrHotels(): int
    {
        return $this->nr_hotels;
    }

    /**
     * Timezone of this destination.
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * Longitude of the point considered to be the centre of the destination. E.g. centre of the city.
     */
    public function getLongitude(): string
    {
        return $this->longitude;
    }

    /**
     * Full location information for this destination. For themes, it is the name of this theme.
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Top 10 tags for which this destination is endorsed.
     */
    public function getEndorsements(): ?array
    {
        return $this->endorsements;
    }

    /**
     * City ufi for destination that is located inside a city.
     * It will not be showed if the destination itself is a city.
     */
    public function getCityUfi(): string
    {
        return $this->city_ufi;
    }

    /**
     * Language code of the returned result.
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * Destination type of this destination, or else the 'theme' type.
     * returns only: airport, city, district, hotel, landmark, region, theme
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * This output fields indicates whether the search result output is right-to-left (rtl) or not.
     * Value 1 means that the output is right-to-left, value 0 means that it isn't.
     */
    public function getRightToLeft(): int
    {
        return $this->right_to_left;
    }

    /**
     * Region name for destination that is located inside a region.
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @return array
     */
    protected function getAttributeMap(): array
    {
        return [
            'name'             => 'string',
            'nr_dest'          => 'integer',
            'latitude'         => 'string',
            'forecast'         => 'array',
            'url'              => 'string',
            'city_name'        => 'string',
            'id'               => 'string',
            'top_destinations' => 'array',
            'country'          => 'string',
            'country_name'     => 'string',
            'nr_hotels'        => 'integer',
            'timezone'         => 'string',
            'longitude'        => 'string',
            'label'            => 'string',
            'endorsements'     => 'array',
            'city_ufi'         => 'string',
            'language'         => 'string',
            'type'             => 'string',
            'right-to-left'    => 'integer',
            'region'           => 'string',
        ];
    }
}
