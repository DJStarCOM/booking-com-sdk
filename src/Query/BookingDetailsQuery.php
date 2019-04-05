<?php

namespace DJStarCOM\BookingComSDK\Query;

use DJStarCOM\BookingComSDK\Models\BookingDetails;

/**
 * Class BookingDetailsQuery
 * @package DJStarCOM\BookingComSDK\Query
 */
class BookingDetailsQuery extends Query
{
    public const EXTRAS_CANCELLATION_INFO = 'cancellation_info';
    public const EXTRAS_NO_SHOW = 'no_show';
    public const EXTRAS_KEY_COLLECTION_INFO = 'key_collection_info';
    public const EXTRAS_TOTAL_ROOM_NIGHTS = 'total_room_nights';
    public const EXTRAS_HOTEL_PAGE_URL = 'hotel_page_url';

    public const OPTIONS_USE_BOOKER_COUNTRY = 'use_booker_country';
    public const OPTIONS_FRONT_DESK_24H = 'front_desk_24h';
    public const OPTIONS_BOOKER_MAILINGLIST_SIGNUP = 'booker_mailinglist_signup';
    public const OPTIONS_USE_GUEST_QUANTITIES_FOR_CHARGES = 'use_guest_quantities_for_charges';
    public const OPTIONS_ALLOW_PAST = 'allow_past';

    /**
     * This endpoint only supports POST http request method.
     *
     * @var string
     */
    protected static $uri = '/bookingDetails';

    /**
     * Booking with guest checked in from this date.
     *
     * @var string
     */
    protected $checkin_from;

    /**
     * Booking with guest checked in until this date.
     *
     * @var string
     */
    protected $checkin_until;

    /**
     * Booking with guest checked out from this date.
     *
     * @var string
     */
    protected $checkout_from;

    /**
     * Booking with guest checked out until this date.
     *
     * @var string
     */
    protected $checkout_until;

    /**
     * Starting date to search bookings by creation timestamp.
     *
     * @var
     */
    protected $created_from;

    /**
     * Ending date to search bookings by creation timestamp.
     *
     * @var
     */
    protected $created_until;

    /**
     * Specify here what extra items of the result should be included.
     * See the endpoint description for more detailed information about each extra
     *
     * Possible values:
     * - cancellation_info
     * - no_show
     * - key_collection_info
     * - total_room_nights
     * - hotel_page_url
     *
     * @var array
     */
    protected $extras;

    /**
     * Limit the results to all data that has been changed since this date.
     *
     * @var string
     */
    protected $last_change;

    /**
     * The local fee currency code.
     *
     * @var string
     */
    protected $local_fee_currency;

    /**
     * Where in the resulting list to start.
     *
     * @var integer
     */
    protected $offset;

    /**
     * Specify here the options for this request.
     * See the endpoint description for more detailed information about each option.
     *
     * @var array
     */
    protected $options;

    /**
     * Id of a booking to show.
     *
     * @var integer
     */
    protected $reservation_id;

    /**
     * The maximum number of entries to return.
     * This can be used together with {offset} to get the data in parts.
     *
     * @var int
     */
    protected $rows;

    /**
     * Limit the results to all data that has the stay intent greater than this score.
     *
     * @var float|null
     */
    protected $stay_probability_from;

    /**
     *Limit the results to all data that has the stay intent less than this score.
     *
     * @var float|null
     */
    protected $stay_probability_to;

    /**
     * @return bool
     */
    public function isSecure(): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function getCheckinFrom(): string
    {
        return $this->checkin_from;
    }

    /**
     * @param string $checkin_from
     * @return $this
     */
    public function setCheckinFrom($checkin_from): self
    {
        $this->checkin_from = $checkin_from;

        return $this;
    }

    /**
     * @return string
     */
    public function getCheckinUntil(): string
    {
        return $this->checkin_until;
    }

    /**
     * @param string $checkin_until
     * @return $this
     */
    public function setCheckinUntil($checkin_until): self
    {
        $this->checkin_until = $checkin_until;

        return $this;
    }

    /**
     * @return string
     */
    public function getCheckoutFrom(): string
    {
        return $this->checkout_from;
    }

    /**
     * @param string $checkout_from
     * @return $this
     */
    public function setCheckoutFrom($checkout_from): self
    {
        $this->checkout_from = $checkout_from;

        return $this;
    }

    /**
     * @return string
     */
    public function getCheckoutUntil(): string
    {
        return $this->checkout_until;
    }

    /**
     * @param string $checkout_until
     * @return $this
     */
    public function setCheckoutUntil($checkout_until): self
    {
        $this->checkout_until = $checkout_until;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedFrom(): string
    {
        return $this->created_from;
    }

    /**
     * @param mixed $created_from
     * @return $this
     */
    public function setCreatedFrom($created_from): self
    {
        $this->created_from = $created_from;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedUntil(): string
    {
        return $this->created_until;
    }

    /**
     * @param mixed $created_until
     * @return $this
     */
    public function setCreatedUntil($created_until): self
    {
        $this->created_until = $created_until;

        return $this;
    }

    /**
     * @return int
     */
    public function getReservationId(): int
    {
        return $this->reservation_id;
    }

    /**
     * @param int $reservation_id
     * @return $this
     */
    public function setReservationId($reservation_id): self
    {
        $this->reservation_id = $reservation_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastChange(): string
    {
        return $this->last_change;
    }

    /**
     * @param string $last_change
     * @return $this
     */
    public function setLastChange($last_change): self
    {
        $this->last_change = $last_change;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocalFeeCurrency(): string
    {
        return $this->local_fee_currency;
    }

    /**
     * @param string $local_fee_currency
     * @return $this
     */
    public function setLocalFeeCurrency($local_fee_currency): self
    {
        $this->local_fee_currency = $local_fee_currency;

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
    public function setOffset($offset): self
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
     * @return BookingDetailsQuery
     */
    public function setRows($rows): self
    {
        $this->rows = $rows;

        return $this;
    }

    /**
     * @return array|null
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

    /**
     * @return BookingDetailsQuery
     */
    public function withExtras(): self
    {
        $this->extras = [
            self::EXTRAS_CANCELLATION_INFO,
            self::EXTRAS_NO_SHOW,
            self::EXTRAS_KEY_COLLECTION_INFO,
            self::EXTRAS_TOTAL_ROOM_NIGHTS,
            self::EXTRAS_HOTEL_PAGE_URL,
        ];

        return $this;
    }

    /**
     * @return array|null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return self
     */
    public function setOptions(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return BookingDetailsQuery
     */
    public function withOptions(): self
    {
        $this->options = [
            self::OPTIONS_USE_BOOKER_COUNTRY,
            self::OPTIONS_FRONT_DESK_24H,
            self::OPTIONS_BOOKER_MAILINGLIST_SIGNUP,
            self::OPTIONS_USE_GUEST_QUANTITIES_FOR_CHARGES,
            self::OPTIONS_ALLOW_PAST,
        ];

        return $this;
    }

    /**
     * @param mixed $stay_probability_from
     * @return $this
     */
    public function setStayProbabilityFrom($stay_probability_from): self
    {
        $this->stay_probability_from = $stay_probability_from;

        return $this;
    }

    /**
     * @param mixed $stay_probability_to
     * @return $this
     */
    public function setStayProbabilityTo($stay_probability_to): self
    {
        $this->stay_probability_to = $stay_probability_to;

        return $this;
    }

    /**
     * @return array
     */
    protected function getAttributeMap(): array
    {
        return [
            'checkin_from'          => 'string',
            'checkin_until'         => 'string',
            'checkout_from'         => 'string',
            'checkout_until'        => 'string',
            'created_from'          => 'string',
            'created_until'         => 'string',
            'extras'                => 'array',
            'last_change'           => 'string',
            'local_fee_currency'    => 'string',
            'offset'                => 'integer',
            'options'               => 'array',
            'reservation_id'        => 'integer',
            'rows'                  => 'integer',
            'stay_probability_from' => 'string',
            'stay_probability_to'   => 'string',
        ];
    }

    /**
     * @return string
     */
    protected function getRequestMethod(): string
    {
        return self::REQUEST_METHOD_POST;
    }

    /**
     * {@inheritDoc}
     */
    protected function model(): string
    {
        return BookingDetails::class;
    }
}
