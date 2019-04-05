<?php

namespace djstarcom\BookingComSDK\Query;

use DateTime;
use djstarcom\BookingComSDK\Models\BlockAvailability;

class BlockAvailabilityQuery extends Query
{
    /**
     * @var string Show the room size and bedding info in the result
     */
    public const EXTRAS_ADDITIONAL_ROOM_INFO = 'additional_room_info';

    /**
     * @var string Show the addon type in the addons records, if returned
     */
    public const EXTRAS_ADDON_TYPE = 'addon_type';

    /**
     * @var string Show addon information for blocks
     */
    public const EXTRAS_ADDONS = 'addons';

    /**
     * @var string Show an indication per hotel if the user needs to enter his address in order to book an hotel
     */
    public const EXTRAS_ADDRESS_REQUIRED = 'address_required';

    /**
     * Show all extra charges, even if not computable.
     * If not computable, do not show the total amount, but include all the other details
     * @var string
     */
    public const EXTRAS_ALL_EXTRA_CHARGES = 'all_extra_charges';

    /**
     * @var string Show total incremental price with split pricing, when split pricing is activated
     */
    public const EXTRAS_ALL_PRICES = 'all_prices';

    /**
     * @var string Show the average commission % for every hotel for the specified period
     */
    public const EXTRAS_BOOKING_COMMISION = 'booking_commission';

    /**
     * @var string Show detailed cancellation timeline for each block, including fees and datetimes
     */
    public const EXTRAS_CANCELLATION_INFO = 'cancellation_info';

    /**
     * @var string Show cc_required field for hotels
     */
    public const EXTRAS_CC_REQUIRED = 'cc_required';

    /**
     * @var string Show flash deals to partners
     */
    public const EXTRAS_DEAL_FLASH = 'deal_flash';

    /**
     * @var string Show lastm deals to partners
     */
    public const EXTRAS_DEAL_LASTM = 'deal_lastm';

    /**
     * @var string Show smart deals to partners
     */
    public const EXTRAS_DEAL_SMART = 'deal_smart';

    /**
     * @var string Show extra beds in group recommendations
     */
    public const EXTRAS_EXTRA_BEDS = 'extra_beds';

    /**
     * @var string Show breakdown of extra charges for each block
     */
    public const EXTRAS_EXTRA_CHARGES = 'extra_charges';

    /**
     * @var string Show facilities
     */
    public const EXTRAS_FACILITIES = 'facilities';

    /**
     * @var string Show recommendations for group bookers
     */
    public const EXTRAS_GROUP_RECOMMENDATIONS = 'group_recommendations';

    /**
     * @var string Show indication if the hotel qualifies for domestic no credit card
     */
    public const EXTRAS_IF_DOMESTIC_NO_CC = 'if_domestic_no_cc';

    /**
     * @var string Show indication if the hotel qualifies for no credit card reservation
     */
    public const EXTRAS_IF_NO_CC_ALLOWED = 'if_no_cc_allowed';

    /**
     * @var string Show important information
     */
    public const EXTRAS_IMPORTANT_INFORMATION = 'important_information';

    /**
     * @var string Show internet/wifi availability
     */
    public const EXTRAS_INTERNET = 'internet';

    /**
     * @var string Show the just_booked flag if the room has been booked in the last 20 minutes
     */
    public const EXTRAS_JUST_BOOKED = 'just_booked';

    /**
     * @var string Shows the maximum number of children allowed for free
     */
    public const EXTRAS_MAX_CHILDREN_FREE = 'max_children_free';

    /**
     * @var string Shows the age limit used for deciding whether children stay for free in a room
     */
    public const EXTRAS_MAX_CHILDREN_FREE_AGE = 'max_children_free_age';

    /**
     * @var string Show max number of rooms in one reservation
     */
    public const EXTRAS_MAX_ROOMS_IN_RESERVATION = 'max_rooms_in_reservation';

    /**
     * @var string Show half-board, full-board and all inclusive mealplan information in the output
     */
    public const EXTRAS_MEALPLANS = 'mealplans';

    /**
     * @var string Show net_price in extra charges
     */
    public const EXTRAS_NET_PRICE = 'net_price';

    /**
     * @var string Show the number of rooms left
     */
    public const EXTRAS_NUMBERS_OF_ROOMS_LEFT = 'number_of_rooms_left';

    /**
     * @var string Show the payment terms name and the description for cancellation and prepay terms.
     */
    public const EXTRAS_PAYMENT_TERMS = 'payment_terms';

    /**
     * @var string Show 1 room photo even if detail_level=0
     */
    public const EXTRAS_PHOTOS = 'photos';

    /**
     * @var string Show policies
     */
    public const EXTRAS_POLICIES = 'policies';

    /**
     * Show url for postcard photo only if high resolution photo for this format is available,
     * otherwise skip it (requires detail_level=1 or extras=photos)
     * @var string
     */
    public const EXTRAS_POSTCARD_PHOTO = 'postcard_photo';

    /**
     * @var string Show rack rates in the output. Using this parameter may significantly affect performance
     */
    public const EXTRAS_RACK_RATES = 'rack_rates';

    /**
     * @var string Show room type id
     */
    public const EXTRAS_ROOM_TYPE_ID = 'room_type_id';

    /**
     * Show the no-smoking bit in the results per block. Possible values are "unknown", "smoking" or "non-smoking"
     * @var string
     */
    public const EXTRAS_SMOKING_STATUS = 'smoking_status';

    /**
     * @var string
     */
    protected static $uri = '/blockAvailability';

    /**
     * @var array
     */
    protected $hotel_ids;

    /**
     * @var string The arrival date. Must be within 360 days in the future and in the format yyyy-mm-dd.
     */
    protected $checkin;

    /**
     * The departure date. Must be later than {checkin}. Must be between 1 and 30 days after {checkin}.
     * Must be within 360 days in the future and in the format yyyy-mm-dd.
     * @var string
     */
    protected $checkout;

    /**
     * @var string Returns the prices in this currency, in addition to the hotel currency
     */
    protected $currency;

    /**
     * @var array The extras parameter definitions are defined in the descriptions.
     */
    protected $extras;

    /**
     * Specify the language for: block_id, policies, room texts and hotel descriptions.
     * Note: not all text is translated in all languages.
     * @var string
     */
    protected $language;

    /**
     * @var int Show blocks from only test hotels (useful for debugging). possible values 0, 1
     */
    protected $show_only_test;

    /**
     * @var int Show blocks from test hotels (useful for debugging). possible values 0, 1
     */
    protected $show_test;

    /**
     * Which guests to put in which rooms. Syntax: comma-separated list,
     * A for each adult, a number in the range 0..17 for each child.If you use this parameter,
     * then you should add guest_quantities to processBooking call,
     * otherwise per-person included charges may cause pricing problems, causing the booking to fail.
     * @var array
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
     * @return BlockAvailabilityQuery
     */
    public function withExtras(): self
    {
        $this->extras = [
            self::EXTRAS_ADDITIONAL_ROOM_INFO,
            self::EXTRAS_ADDON_TYPE,
            self::EXTRAS_ADDONS,
            self::EXTRAS_ADDRESS_REQUIRED,
            self::EXTRAS_ALL_EXTRA_CHARGES,
            self::EXTRAS_ALL_PRICES,
            self::EXTRAS_BOOKING_COMMISION,
            self::EXTRAS_CANCELLATION_INFO,
            self::EXTRAS_CC_REQUIRED,
            self::EXTRAS_DEAL_LASTM,
            self::EXTRAS_DEAL_SMART,
            self::EXTRAS_EXTRA_BEDS,
            self::EXTRAS_EXTRA_CHARGES,
            self::EXTRAS_FACILITIES,
            self::EXTRAS_GROUP_RECOMMENDATIONS,
            self::EXTRAS_IF_DOMESTIC_NO_CC,
            self::EXTRAS_IF_NO_CC_ALLOWED,
            self::EXTRAS_IMPORTANT_INFORMATION,
            self::EXTRAS_INTERNET,
            self::EXTRAS_JUST_BOOKED,
            self::EXTRAS_MAX_CHILDREN_FREE,
            self::EXTRAS_MAX_CHILDREN_FREE_AGE,
            self::EXTRAS_MAX_ROOMS_IN_RESERVATION,
            self::EXTRAS_MEALPLANS,
            self::EXTRAS_NET_PRICE,
            self::EXTRAS_NUMBERS_OF_ROOMS_LEFT,
            self::EXTRAS_PAYMENT_TERMS,
            self::EXTRAS_PHOTOS,
            self::EXTRAS_POLICIES,
            self::EXTRAS_POSTCARD_PHOTO,
            self::EXTRAS_RACK_RATES,
            self::EXTRAS_ROOM_TYPE_ID,
            self::EXTRAS_SMOKING_STATUS,
        ];

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
     * @return int
     */
    public function getShowOnlyTest(): ?int
    {
        return $this->show_only_test;
    }

    /**
     * @param bool $show_only_test
     * @return self
     */
    public function setShowOnlyTest(bool $show_only_test): self
    {
        $this->show_only_test = (int)$show_only_test;

        return $this;
    }

    /**
     * @return int
     */
    public function getShowTest(): ?int
    {
        return $this->show_test;
    }

    /**
     * @param bool $show_test
     * @return self
     */
    public function setShowTest(bool $show_test): self
    {
        $this->show_test = (int)$show_test;

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
    protected function getAttributeMap(): array
    {
        return [
            'hotel_ids'      => 'array',
            'checkin'        => 'string',
            'checkout'       => 'string',
            'currency'       => 'string',
            'extras'         => 'array',
            'language'       => 'string',
            'show_only_test' => 'integer',
            'show_test'      => 'integer',
            'room1'          => 'array',
            'room2'          => 'array',
            'room3'          => 'array',
            'room4'          => 'array',
            'room5'          => 'array',
            'room6'          => 'array',
            'room7'          => 'array',
            'room8'          => 'array',
            'room9'          => 'array',
            'room10'         => 'array',
            'room11'         => 'array',
            'room12'         => 'array',
            'room13'         => 'array',
            'room14'         => 'array',
            'room15'         => 'array',
            'room16'         => 'array',
            'room17'         => 'array',
            'room18'         => 'array',
            'room19'         => 'array',
            'room20'         => 'array',
            'room21'         => 'array',
            'room22'         => 'array',
            'room23'         => 'array',
            'room24'         => 'array',
            'room25'         => 'array',
            'room26'         => 'array',
            'room27'         => 'array',
            'room28'         => 'array',
            'room29'         => 'array',
            'room30'         => 'array',
        ];
    }

    /**
     * {@inheritDoc}
     */
    protected function model(): string
    {
        return BlockAvailability::class;
    }

}
