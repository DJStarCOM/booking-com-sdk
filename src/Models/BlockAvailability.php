<?php

namespace DJStarCOM\BookingComSDK\Models;

/**
 * @package DJStarCOM\BookingComSDK\Models
 */
class BlockAvailability extends Model
{
    const EXTRA_ALL_PRICES = 'all_prices';
    const EXTRA_GROUP_RECOMMENDATIONS = 'group_recommendations';
    const EXTRA_FACILITIES = 'facilities';
    const EXTRA_NUMBER_OF_ROOMS_LEFT = 'number_of_rooms_left';
    const EXTRA_JUST_BOOKED = 'just_booked';
    const EXTRA_PAYMENT_TERMS = 'payment_terms';
    const EXTRA_INTERNET = 'internet';
    const EXTRA_EXTRA_CHARGES = 'extra_charges';
    const EXTRA_ADDRESS_REQUIRED = 'address_required';
    const EXTRA_ALL_EXTRA_CHARGES = 'all_extra_charges';
    const EXTRA_ADDONS = 'addons';
    const EXTRA_MAX_CHILDREN_FREE_AGE = 'max_children_free_age';
    const EXTRA_POLICIES = 'policies';
    const EXTRA_CANCELLATION_INFO = 'cancellation_info';
    const EXTRA_DEAL_LASTM = 'deal_lastm';
    const EXTRA_ADDITIONAL_ROOM_INFO = 'additional_room_info';
    const EXTRA_MAX_ROOMS_IN_RESERVATION = 'max_rooms_in_reservation';
    const EXTRA_MAX_CHILDREN_FREE = 'max_children_free';
    const EXTRA_MEALPLANS = 'mealplans';
    const EXTRA_IF_DOMESTIC_NO_CC = 'if_domestic_no_cc';
    const EXTRA_CC_REQUIRED = 'cc_required';
    const EXTRA_ADDON_TYPE = 'addon_type';
    const EXTRA_EXTRA_BEDS = 'extra_beds';
    const EXTRA_IF_NO_CC_ALLOWED = 'if_no_cc_allowed';
    const EXTRA_RACK_RATES = 'rack_rates';
    const EXTRA_IMPORTANT_INFORMATION = 'important_information';
    const EXTRA_NET_PRICE = 'net_price';
    const EXTRA_ROOM_TYPE_ID = 'room_type_id';
    const EXTRA_DEAL_FLASH = 'deal_flash';
    const EXTRA_PHOTOS = 'photos';
    const EXTRA_POSTCARD_PHOTO = 'postcard_photo';

    /**
     * @var string
     */
    protected $hotel_id;

    /**
     * @var string
     */
    protected $checkin;

    /**
     * @var string
     */
    protected $checkout;

    /**
     * @var array
     */
    protected $block;

    /**
     * @var array
     */
    protected $policies;

    /**
     * @var string
     */
    protected $important_information;

    /**
     * @var string
     */
    protected $hotel_url;

    /**
     * @var int
     */
    protected $max_rooms_in_reservation;

    /**
     * @var bool
     */
    protected $address_required;

    /**
     * @var bool
     */
    protected $qualifies_for_no_cc_reservation;

    /**
     * @var bool
     */
    protected $domestic_no_cc;

    /**
     * @var string
     */
    protected $license_number;

    /**
     * @var bool
     */
    protected $cc_required;

    /**
     * @var bool
     */
    protected $is_flash_deal;

    /**
     * @var bool
     */
    protected $cvc_required;

    /**
     * @var array
     */
    private $incremental_price;

    /**
     * Booking.com hotel ID. The unique identifier of this hotel.
     * @return int
     */
    public function getHotelId(): int
    {
        return $this->hotel_id;
    }

    /**
     * The date that was searched for as checkin. Format: YYYY-MM-DD
     * @return string
     */
    public function getCheckin(): string
    {
        return $this->checkin;
    }

    /**
     * The date that was searched for as checkout. Format: YYYY-MM-DD
     * @return string
     */
    public function getCheckout(): string
    {
        return $this->checkout;
    }

    /**
     * The object containing all the relevant information for the combination of room, policy,
     * meal and occupancy that determines the price. A block is the unique entity you book with booking.com.
     * @return array
     */
    public function getBlock(): array
    {
        return $this->block;
    }

    /**
     * The rules governing the booking and requirements of this block.
     * @return array
     */
    public function getPolicies(): array
    {
        return $this->policies;
    }

    /**
     * Additional important hotel information.
     * @return string
     */
    public function getImportantInformation(): ?string
    {
        return $this->important_information;
    }

    /**
     * URL of the hotel's page on Booking.com.
     * @return string
     */
    public function getHotelUrl(): ?string
    {
        return $this->hotel_url;
    }

    /**
     * Maximum number of rooms this property allows in one booking. Zero means: unlimited.
     * @return int
     */
    public function getMaxRoomsInReservation(): ?int
    {
        return $this->max_rooms_in_reservation;
    }

    /**
     * Boolean value set to "true" if address is required or "false" if it is not required.
     * @return bool
     */
    public function getAddressRequired(): ?bool
    {
        return $this->address_required;
    }

    /**
     * Boolean value set to "true" if the hotel qualifies for no credit card reservation or "false" if it is not.
     * @return bool
     */
    public function getQualifiesForNoCcReservation(): ?bool
    {
        return $this->qualifies_for_no_cc_reservation;
    }

    /**
     * This value tells if the hotel is bookable without credit card details for domestic bookers.
     * It is showed when the 'if_domestic_no_cc=1' param is used in your request.
     * In order to this value to be accurate, the API call must be aware of the guest's country.
     * You can pass the guest's country code via the param 'guest_cc',
     * or as well attempt to use 'guest_ip' if you don't have guest country, but you have their IP address.
     * Though, the IP address may be unresolvable to a country code,
     * or it may as well be that the guest accesses your website through a proxy,
     * which originates from a different country than the guest's original IP address.
     * @return bool
     */
    public function getDomesticNoCc(): ?bool
    {
        return $this->domestic_no_cc;
    }

    /**
     * Shows licence information of the hotel.
     * @return string
     */
    public function getLicenseNumber(): ?string
    {
        return $this->license_number;
    }

    /**
     * Boolean value set to "true" credit card is required for reservation or "false" if it is not required.
     * @return bool
     */
    public function getCcRequired(): ?bool
    {
        return $this->cc_required;
    }

    /**
     * Boolean value set to "true" for a flash deal or "false" if not a flash deal.
     * @return bool
     */
    public function getIsFlashDeal(): ?bool
    {
        return $this->is_flash_deal;
    }

    /**
     * Boolean value set to "true" CVC of a credit card is required for reservation or "false" if it is not required.
     * @return bool
     */
    public function getCvcRequired(): ?bool
    {
        return $this->cvc_required;
    }

    /**
     *
     * @return mixed
     */
    public function getIncrementalPrice(): array
    {
        return $this->incremental_price;
    }

    /**
     * @return array
     */
    protected function getAttributeMap(): array
    {
        return [
            'hotel_id'                        => 'string',
            'checkin'                         => 'string',
            'checkout'                        => 'string',
            'block'                           => 'array',
            'policies'                        => 'array',
            'important_information'           => 'string',
            'hotel_url'                       => 'string',
            'max_rooms_in_reservation'        => 'integer',
            'address_required'                => 'boolean',
            'qualifies_for_no_cc_reservation' => 'boolean',
            'domestic_no_cc'                  => 'boolean',
            'license_number'                  => 'string',
            'cc_required'                     => 'boolean',
            'is_flash_deal'                   => 'boolean',
            'cvc_required'                    => 'boolean',
            'incremental_price'               => 'array',
        ];
    }
}
