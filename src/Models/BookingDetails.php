<?php

namespace DJStarCOM\BookingComSDK\Models;

/**
 * Class BookingDetails
 * @package DJStarCOM\BookingComSDK\Models
 */
class BookingDetails extends Model
{
    /**
     * @var int
     */
    protected $reservation_id;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var int
     */
    protected $affiliate_id;

    /**
     * @var string
     */
    protected $affiliate_label;

    /**
     * @var string
     */
    protected $chain_ids;

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
    protected $hotel_fax;

    /**
     * @var string
     */
    protected $hotel_address;

    /**
     * @var string
     */
    protected $hotel_zipcode;

    /**
     * @var string
     */
    protected $destination_ufi;

    /**
     * @var string
     */
    protected $hotel_countrycode;

    /**
     * @var string
     */
    protected $booker_firstname;

    /**
     * @var string
     */
    protected $booker_lastname;

    /**
     * @var string|null
     */
    protected $booker_phone;

    /**
     * @var string
     */
    protected $booker_email;

    /**
     * @var string
     */
    protected $booker_mailinglist;

    /**
     * @var string
     */
    protected $guest_name;

    /**
     * @var string
     */
    protected $guest_city;

    /**
     * @var string
     */
    protected $guest_country;

    /**
     * @var string
     */
    protected $loyalty_member_id;

    /**
     * @var string
     */
    protected $pincode;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $created;

    /**
     * @var string|null
     */
    protected $checkin;

    /**
     * @var string|null
     */
    protected $checkout;

    /**
     * @var string
     */
    protected $cancellation_date;

    /**
     * @var string
     */
    protected $fee_calculation_date;

    /**
     * @var int|null
     */
    protected $fee_percentage;

    /**
     * @var float|null
     */
    protected $euro_fee;

    /**
     * @var float|null
     */
    protected $local_fee;

    /**
     * @var string
     */
    protected $local_fee_currency;

    /**
     * @var float|null
     */
    protected $price_euro;

    /**
     * @var float|null
     */
    protected $price_local;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var int
     */
    protected $creditslip;

    /**
     * @var int
     */
    protected $total_room_nights;

    /**
     * @var int
     */
    protected $nr_rooms;

    /**
     * @var int
     */
    protected $nr_guests;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var float|null
     */
    protected $stay_probability;

    /**
     * @return int
     */
    public function getReservationId(): int
    {
        return $this->reservation_id;
    }

    /**
     * @param int $reservation_id
     */
    public function setReservationId(int $reservation_id): void
    {
        $this->reservation_id = $reservation_id;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getAffiliateId(): int
    {
        return $this->affiliate_id;
    }

    /**
     * @param int $affiliate_id
     */
    public function setAffiliateId(int $affiliate_id): void
    {
        $this->affiliate_id = $affiliate_id;
    }

    /**
     * @return string
     */
    public function getAffiliateLabel(): ?string
    {
        return $this->affiliate_label;
    }

    /**
     * @param string $affiliate_label
     */
    public function setAffiliateLabel(?string $affiliate_label): void
    {
        $this->affiliate_label = $affiliate_label;
    }

    /**
     * @return string
     */
    public function getChainIds(): ?string
    {
        return $this->chain_ids;
    }

    /**
     * @param string $chain_ids
     */
    public function setChainIds(?string $chain_ids): void
    {
        $this->chain_ids = $chain_ids;
    }

    /**
     * @return int
     */
    public function getHotelId(): int
    {
        return $this->hotel_id;
    }

    /**
     * @param int $hotel_id
     */
    public function setHotelId(int $hotel_id): void
    {
        $this->hotel_id = $hotel_id;
    }

    /**
     * @return string
     */
    public function getHotelName(): ?string
    {
        return $this->hotel_name;
    }

    /**
     * @param string $hotel_name
     */
    public function setHotelName(?string $hotel_name): void
    {
        $this->hotel_name = $hotel_name;
    }

    /**
     * @return string
     */
    public function getHotelFax(): ?string
    {
        return $this->hotel_fax;
    }

    /**
     * @param string $hotel_fax
     */
    public function setHotelFax(?string $hotel_fax): void
    {
        $this->hotel_fax = $hotel_fax;
    }

    /**
     * @return string
     */
    public function getHotelAddress(): ?string
    {
        return $this->hotel_address;
    }

    /**
     * @param string $hotel_address
     */
    public function setHotelAddress(?string $hotel_address): void
    {
        $this->hotel_address = $hotel_address;
    }

    /**
     * @return string
     */
    public function getHotelZipcode(): ?string
    {
        return $this->hotel_zipcode;
    }

    /**
     * @param string $hotel_zipcode
     */
    public function setHotelZipcode(?string $hotel_zipcode): void
    {
        $this->hotel_zipcode = $hotel_zipcode;
    }

    /**
     * @return string
     */
    public function getDestinationUfi(): ?string
    {
        return $this->destination_ufi;
    }

    /**
     * @param string $destination_ufi
     */
    public function setDestinationUfi(?string $destination_ufi): void
    {
        $this->destination_ufi = $destination_ufi;
    }

    /**
     * @return string
     */
    public function getHotelCountrycode(): ?string
    {
        return $this->hotel_countrycode;
    }

    /**
     * @param string $hotel_countrycode
     */
    public function setHotelCountrycode(?string $hotel_countrycode): void
    {
        $this->hotel_countrycode = $hotel_countrycode;
    }

    /**
     * @return null|string
     */
    public function getBookerFirstname(): ?string
    {
        return $this->booker_firstname;
    }

    /**
     * @param null|string $booker_firstname
     */
    public function setBookerFirstname(?string $booker_firstname): void
    {
        $this->booker_firstname = $booker_firstname;
    }

    /**
     * @return null|string
     */
    public function getBookerLastname(): ?string
    {
        return $this->booker_lastname;
    }

    /**
     * @param null|string $booker_lastname
     */
    public function setBookerLastname(?string $booker_lastname): void
    {
        $this->booker_lastname = $booker_lastname;
    }

    /**
     * @return string|null
     */
    public function getBookerPhone(): ?string
    {
        return $this->booker_phone;
    }

    /**
     * @param string|null $booker_phone
     */
    public function setBookerPhone(?string $booker_phone): void
    {
        $this->booker_phone = $booker_phone;
    }

    /**
     * @return string
     */
    public function getBookerEmail(): string
    {
        return $this->booker_email;
    }

    /**
     * @param string $booker_email
     */
    public function setBookerEmail(string $booker_email): void
    {
        $this->booker_email = $booker_email;
    }

    /**
     * @return string
     */
    public function getBookerMailinglist(): ?string
    {
        return $this->booker_mailinglist;
    }

    /**
     * @param string $booker_mailinglist
     */
    public function setBookerMailinglist(?string $booker_mailinglist): void
    {
        $this->booker_mailinglist = $booker_mailinglist;
    }

    /**
     * @return string
     */
    public function getGuestName(): ?string
    {
        return $this->guest_name;
    }

    /**
     * @param string $guest_name
     */
    public function setGuestName(?string $guest_name): void
    {
        $this->guest_name = $guest_name;
    }

    /**
     * @return string
     */
    public function getGuestCity(): ?string
    {
        return $this->guest_city;
    }

    /**
     * @param string $guest_city
     */
    public function setGuestCity(?string $guest_city): void
    {
        $this->guest_city = $guest_city;
    }

    /**
     * @return string
     */
    public function getGuestCountry(): ?string
    {
        return $this->guest_country;
    }

    /**
     * @param string $guest_country
     */
    public function setGuestCountry(?string $guest_country): void
    {
        $this->guest_country = $guest_country;
    }

    /**
     * @return string
     */
    public function getLoyaltyMemberId(): ?string
    {
        return $this->loyalty_member_id;
    }

    /**
     * @param string $loyalty_member_id
     */
    public function setLoyaltyMemberId(?string $loyalty_member_id): void
    {
        $this->loyalty_member_id = $loyalty_member_id;
    }

    /**
     * @return string
     */
    public function getPincode(): string
    {
        return $this->pincode;
    }

    /**
     * @param string $pincode
     */
    public function setPincode(string $pincode): void
    {
        $this->pincode = $pincode;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * @param string $created
     */
    public function setCreated(string $created): void
    {
        $this->created = $created;
    }

    /**
     * @return string|null
     */
    public function getCheckin(): ?string
    {
        return $this->checkin;
    }

    /**
     * @param string|null $checkin
     */
    public function setCheckin(?string $checkin): void
    {
        $this->checkin = $checkin;
    }

    /**
     * @return string|null
     */
    public function getCheckout(): ?string
    {
        return $this->checkout;
    }

    /**
     * @param string|null $checkout
     */
    public function setCheckout(?string $checkout): void
    {
        $this->checkout = $checkout;
    }

    /**
     * @return string
     */
    public function getCancellationDate(): ?string
    {
        return $this->cancellation_date;
    }

    /**
     * @param string $cancellation_date
     */
    public function setCancellationDate(?string $cancellation_date): void
    {
        $this->cancellation_date = $cancellation_date;
    }

    /**
     * @return string
     */
    public function getFeeCalculationDate(): ?string
    {
        return $this->fee_calculation_date;
    }

    /**
     * @param string $fee_calculation_date
     */
    public function setFeeCalculationDate(?string $fee_calculation_date): void
    {
        $this->fee_calculation_date = $fee_calculation_date;
    }

    /**
     * @return int|null
     */
    public function getFeePercentage(): ?int
    {
        return $this->fee_percentage;
    }

    /**
     * @param int|null $fee_percentage
     */
    public function setFeePercentage(?int $fee_percentage): void
    {
        $this->fee_percentage = $fee_percentage;
    }

    /**
     * @return float|null
     */
    public function getEuroFee(): ?float
    {
        return $this->euro_fee;
    }

    /**
     * @param float|null $euro_fee
     */
    public function setEuroFee(?float $euro_fee): void
    {
        $this->euro_fee = $euro_fee;
    }

    /**
     * @return float
     */
    public function getLocalFee(): ?float
    {
        return $this->local_fee;
    }

    /**
     * @param float $local_fee
     */
    public function setLocalFee(?float $local_fee): void
    {
        $this->local_fee = $local_fee;
    }

    /**
     * @return string
     */
    public function getLocalFeeCurrency(): ?string
    {
        return $this->local_fee_currency;
    }

    /**
     * @param string $local_fee_currency
     */
    public function setLocalFeeCurrency(?string $local_fee_currency): void
    {
        $this->local_fee_currency = $local_fee_currency;
    }

    /**
     * @return float|null
     */
    public function getPriceEuro(): ?float
    {
        return $this->price_euro;
    }

    /**
     * @param float|null $price_euro
     */
    public function setPriceEuro(?float $price_euro): void
    {
        $this->price_euro = $price_euro;
    }

    /**
     * @return float|null
     */
    public function getPriceLocal(): ?float
    {
        return $this->price_local;
    }

    /**
     * @param float|null $price_local
     */
    public function setPriceLocal(?float $price_local): void
    {
        $this->price_local = $price_local;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getCreditslip(): ?string
    {
        return $this->creditslip;
    }

    /**
     * @param string $creditslip
     */
    public function setCreditslip(?string $creditslip): void
    {
        $this->creditslip = $creditslip;
    }

    /**
     * @return int
     */
    public function getTotalRoomNights(): ?int
    {
        return $this->total_room_nights;
    }

    /**
     * @param int $total_room_nights
     */
    public function setTotalRoomNights(?int $total_room_nights): void
    {
        $this->total_room_nights = $total_room_nights;
    }

    /**
     * @return int
     */
    public function getNrRooms(): ?int
    {
        return $this->nr_rooms;
    }

    /**
     * @param int $nr_rooms
     */
    public function setNrRooms(?int $nr_rooms): void
    {
        $this->nr_rooms = $nr_rooms;
    }

    /**
     * @return int
     */
    public function getNrGuests(): ?int
    {
        return $this->nr_guests;
    }

    /**
     * @param int $nr_guests
     */
    public function setNrGuests(?int $nr_guests): void
    {
        $this->nr_guests = $nr_guests;
    }

    /**
     * @return string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return float|null
     */
    public function getStayProbability(): ?float
    {
        return $this->stay_probability;
    }

    /**
     * @param float|null $stay_probability
     */
    public function setStayProbability(?float $stay_probability): void
    {
        $this->stay_probability = $stay_probability;
    }

    /**
     * @return array
     */
    protected function getAttributeMap(): array
    {
        return [
            'reservation_id'       => 'int',
            'status'               => 'string',
            'affiliate_id'         => 'int',
            'affiliate_label'      => 'string',
            'chain_ids'            => 'string',
            'hotel_id'             => 'int',
            'hotel_name'           => 'string',
            'hotel_fax'            => 'string',
            'hotel_address'        => 'string',
            'hotel_zipcode'        => 'string',
            'destination_ufi'      => 'string',
            'hotel_countrycode'    => 'string',
            'booker_firstname'     => 'string',
            'booker_lastname'      => 'string',
            'booker_phone'         => 'string',
            'booker_email'         => 'string',
            'booker_mailinglist'   => 'string',
            'guest_name'           => 'string',
            'guest_city'           => 'string',
            'guest_country'        => 'string',
            'loyalty_member_id'    => 'string',
            'pincode'              => 'string',
            'language'             => 'string',
            'created'              => 'string',
            'checkin'              => 'string',
            'checkout'             => 'string',
            'cancellation_date'    => 'string',
            'fee_calculation_date' => 'string',
            'fee_percentage'       => 'int',
            'euro_fee'             => 'float',
            'local_fee'            => 'float',
            'local_fee_currency'   => 'string',
            'price_euro'           => 'float',
            'price_local'          => 'float',
            'currency'             => 'string',
            'creditslip'           => 'int',
            'total_room_nights'    => 'int',
            'nr_rooms'             => 'int',
            'nr_guests'            => 'int',
            'url'                  => 'string',
            'stay_probability'     => 'float',
        ];
    }
}
