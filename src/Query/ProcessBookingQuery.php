<?php

namespace djstarcom\BookingComSDK\Query;

use DateTime;
use djstarcom\BookingComSDK\Models\ProcessBooking;
use djstarcom\BookingComSDK\Models\Result;

class ProcessBookingQuery extends Query
{
    const PAY_TYPE_AMERICAN_EXPRESS = 1;
    const PAY_TYPE_VISA = 2;
    const PAY_TYPE_MASTERCARD = 3;
    const PAY_TYPE_DINERS_CLUB = 5;

    /**
     * @var string
     */
    protected static $uri = '/processBooking';

    /**
     * Telephone number of the booker.
     * example value "+00000000000"
     *
     * @var array required
     */
    protected $booker_telephone;

    /**
     * Country of the booker.
     * example value "nl"
     *
     * possible values.
     * There is a long list of possible values for this parameter.
     * Please see Values for countries:
     * https://developers.booking.com/api/commercial/index.html?page_url=possible-values
     * languages, airports, currencies for the full list.
     *
     * @var string required
     */
    protected $booker_country;

    /**
     * Id of the hotel where the booked blocks are.
     * Only one id may be specified per /processBooking endpoint.
     * example value 11024
     *
     * @var int required
     */
    protected $hotel_id;

    /**
     * The affiliate id for which this booking should be processed.
     * It may be overridden by {partner_affiliate_id}.
     * example value 000000
     *
     * @var int required
     */
    protected $affiliate_id;

    /**
     * One or multiple block ids. One should use {block_quantities}
     * to specify the quantity of blocks per block_ids that are passed.
     *
     * example value 5555555_55555555_5_5_5
     * depends on incremental_prices
     *
     * @var array required
     */
    protected $block_ids;

    /**
     * Booking checkin date. It may be today or within 360 days in the future.
     * example value 2018-10-11
     *
     * @var string required
     */
    protected $checkin;

    /**
     * Booking checkout date. It may be between 1 and 30 days after the {checkin}.
     *
     * @var string required
     */
    protected $checkout;

    /**
     * Email address of the
     * example value john.smith@booking.com
     *
     * @var string required
     */
    protected $booker_email;

    /**
     * A comma-separated list of add ons, given in same order as guest_quantities.
     * Multiple add ons per item are semicolon-separated (%3B).
     * The format of one add on is ADDON_{block_id}_{addon_id}:{price}.
     *
     * @var array
     */
    protected $addon_prices;

    /**
     * The affiliate label information, that may be added to the booking during processing.
     * One can then read it back in /bookingDetails.
     *
     * @var string
     */
    protected $affiliate_label;

    /**
     * A comma-separated list of bed preferences, given in same order as room_ids or block_ids,
     * taking into account their quantities. Use 0 for no preference,
     * 1 for default or 2 for alternative. Please note that it can
     * not be guaranteed that the selected preference will be available.
     * example value 0
     * possible values 0, 1, 2
     *
     * @var array
     */
    protected $bed_preferences;

    /**
     * An comma-separated list of preferred bed types, given in same order
     * as room_ids or block_ids, taking into account their quantities.
     * If only one bed type is supplied, it will apply to all rooms/blocks.
     * Use 0 for no preference, 1 for single/twin beds, 2 for double beds.
     * Please note that it can not be guaranteed that the selected preference will be available.
     * example value 0
     * possible values 0, 1, 2
     *
     * @var array
     */
    protected $bedtype_preferences;

    /**
     * Quantities of blocks that should be booked. In case that multiple block_ids
     * are specified under {block_ids}, one number per block_id should be given
     * in this input parameter. These quantities may only be between 1 and 10.
     * They also may not exceed the available number of blocks (for all prices).
     * To determine how many rooms can be booked for each block_id, refer to number
     * of <incremental_price> field or {extras=max_rooms_in_reservation} parameter in /BlockAvailability
     * example value 1
     *
     * @var array
     */
    protected $block_quantities;

    /**
     * Street address of the booker. To determine if the address is required,
     * use {extras=address_required} in /blockAvailability
     * example value "Herengracht 597"
     *
     * @var string
     */
    protected $booker_address;

    /**
     * City of the booker.
     * example value "Amsterdam"
     *
     * @var string
     */
    protected $booker_city;

    /**
     * Company of the booker.
     * @var string
     */
    protected $booker_company;

    /**
     * First name of the booker (up to 255 characters).
     * example value "John"
     * depends on "booker_lastname"
     *
     * @var string
     */
    protected $booker_firstname;

    /**
     * IP address of the booker. It is used to determine guest country.
     * It may be overridden by {i_am_from}. It supports the IPv4 format.
     * example value "0.0.0.0"
     *
     * @var string
     */
    protected $booker_ip;

    /**
     * Language used by the booker to make the booking.
     * example value "en"
     *
     * @var string
     */
    protected $booker_language;

    /**
     * Last name of the booker (up to 255 characters).
     * example value "Smith"
     * depends on "booker_firstname"
     *
     * @var string
     */
    protected $booker_lastname;

    /**
     * Zip code of the booker.
     *
     * @var string
     */
    protected $booker_zip;

    /**
     * Name of the credit card holder.
     *
     * @var string
     */
    protected $cc_cardholder;

    /**
     * Three digit validation code of the credit card.
     * example value "000"
     *
     * @var string
     */
    protected $cc_cvc;

    /**
     * Expiry date of the credit card. Please note that only the year and month will be used
     * and the day number will be ignored.*
     * example value "0000-00-00"
     *
     * @var string
     */
    protected $cc_expiration_date;

    /**
     * Number of the credit card.
     * example value "0000000000000000"
     * @var string
     */
    protected $cc_number;

    /**
     * Type of the credit card. It may be one of 1, 2, 3 or one of the credit card types
     * accepted by the booked hotel. Also see the /paymentTypes endpoint.
     * example value 3
     * conflicts with cc_organisation
     * @var int
     */
    protected $cc_type;

    /**
     * Optional remarks from the guest.
     * example value "Arriving shortly after midnight."
     *
     * @var string
     */
    protected $comments;

    /**
     * Currency used for direct payments may be specified here.
     * example value "EUR"
     * possible values. There is a long list of possible values for this parameter
     * (https://developers.booking.com/api/commercial/index.html?page_url=possible-values).
     * Please see Values for countries,
     * languages, airports, currencies for the full list.
     *
     * @var string
     */
    protected $currency;

    /**
     * Specify here what extra items of the result should be included.
     * See the endpoint description for more detailed information about each extra.
     * possible values hotel_contact_info
     *
     * @var array
     */
    protected $extras;

    /**
     * Allows partners to forward the booker's user agent. This information
     * is stored into the transaction for the record.
     * example value "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:54.0) Gecko/20100101 Firefox/54.0"
     *
     * @var string
     */
    protected $forwarded_user_agent;

    /**
     * A comma-separated list of guest emails. If provided this list should be of the same length as guest_names.
     * example value "john.smith@booking.com"
     *
     * @var array
     */
    protected $guest_emails;

    /**
     * A comma-separated list of guest names. If booker_firstname and booker_lastname are used,
     * then this list should be of same size or shorter than quantity of rooms or blocks given.
     * Otherwise, the first name in {guest_names} is the name of the booker followed by guests names,
     * not longer than the quantity of rooms + 1. First is booker's name of the booker,
     * then followed by names of other guests.
     * example value "John Smith"
     *
     * @var array
     */
    protected $guest_names;

    /**
     * Quantities of guests per block, given in same order as block_ids, with block_quantities on mind.
     * This number should not exceed [hotel][block]{max_occupancy}.
     * example value "1"
     *
     * @var array
     */
    protected $guest_quantities;

    /**
     * Guests' approximate hour of arrival to the hotel on the {checkin} date.
     * Allowed values are from 0 (00:00 - 01:00) to 25 (01:00 - 02:00 (the next day)).
     * This time should be within the hotel reception hours, or will be ignored otherwise with
     * a warning appended to guestd comments.
     * example value 12
     * possible values 0, ... , 25
     *
     * @var string
     */
    protected $hour_of_arrival;

    /**
     * Comma-separated list of total prices for each supplied block_id, given in the same order
     * as block_ids and block_quantities.
     * example value 105.95
     *
     * @var array
     */
    protected $incremental_prices;

    /**
     * Use this to see predictions of booker's next destinations.
     * The supplied number tells how many destinations should be showed at most.
     * example value 3
     *
     * @var int
     */
    protected $next_trips;

    /**
     * Specify here the options for this request. See the endpoint description
     * for more detailed information about each option.
     * possible values
     * booker_mailinglist_signup, use_booker_country, front_desk_24h,
     * use_guest_quantities_for_charges, allow_past
     *
     * @var array
     */
    protected $options;

    /**
     * Unique id that identifies the request from client point of view
     * example value "00000000-0000-0000-0000-000000000000"
     *
     * @var string
     */
    protected $request_id;

    /**
     * Enable bookings on test hotels (useful for debugging). Note: don't use this setting
     * for making test bookings on live hotels!
     * example value 0
     * possible values 0, 1
     *
     * @var int
     */
    protected $show_test;

    /**
     * A comma-separated list of smoking preferences, given in same order as room_ids or block_ids,
     * taking into account their quantities. If only one smoking preference is supplied,
     * it applies to all rooms/blocks. Use 0 for no preference, 1 for non-smoking preferred,
     * 2 for smoking preferred.
     * Please note that it can not be guaranteed that the selected preference will be available.
     * example value 2
     * possible values 0, 1, 2
     *
     * @var array
     */
    protected $smoking_preferences;

    /**
     * Check all input parameters and availability without making a real reservation. This is useful for debugging,
     * all the booking steps prior to making the reservation will take place
     * The inventory won't be modified and no transaction_id will be returned.
     * example value 0
     * possible values 0, 1
     *
     * @var int
     */
    protected $test_mode;

    /**
     * Booker's choice of travel purpose. It may be 'business' or 'leisure'.
     * example value business
     * possible values business, leisure
     *
     * @var string
     */
    protected $travel_purpose;

    /**
     * @return array
     */
    public function getBookerTelephone(): array
    {
        return $this->booker_telephone;
    }

    /**
     * @param array $booker_telephone
     * @return $this
     */
    public function setBookerTelephone(array $booker_telephone): self
    {
        $this->booker_telephone = $booker_telephone;
        return $this;
    }

    /**
     * @return string
     */
    public function getBookerCountry(): string
    {
        return $this->booker_country;
    }

    /**
     * @param string $booker_country
     * @return $this
     */
    public function setBookerCountry(string $booker_country): self
    {
        $this->booker_country = $booker_country;
        return $this;
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
     * @return $this
     */
    public function setHotelId(int $hotel_id): self
    {
        $this->hotel_id = $hotel_id;
        return $this;
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
     * @return $this
     */
    public function setAffiliateId(int $affiliate_id): self
    {
        $this->affiliate_id = $affiliate_id;
        return $this;
    }

    /**
     * @return array
     */
    public function getBlockIds(): array
    {
        return $this->block_ids;
    }

    /**
     * @param array $block_ids
     * @return $this
     */
    public function setBlockIds(array $block_ids): self
    {
        $this->block_ids = $block_ids;
        return $this;
    }

    /**
     * @return string
     */
    public function getCheckin(): string
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
    public function getCheckout(): string
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
    public function getBookerEmail(): string
    {
        return $this->booker_email;
    }

    /**
     * @param string $booker_email
     * @return $this
     */
    public function setBookerEmail(string $booker_email): self
    {
        $this->booker_email = $booker_email;
        return $this;
    }

    /**
     * @return array
     */
    public function getAddonPrices(): array
    {
        return $this->addon_prices;
    }

    /**
     * @param array $addon_prices
     * @return $this
     */
    public function setAddonPrices(array $addon_prices): self
    {
        $this->addon_prices = $addon_prices;
        return $this;
    }

    /**
     * @return string
     */
    public function getAffiliateLabel(): string
    {
        return $this->affiliate_label;
    }

    /**
     * @param string $affiliate_label
     * @return $this
     */
    public function setAffiliateLabel(string $affiliate_label): self
    {
        $this->affiliate_label = $affiliate_label;
        return $this;
    }

    /**
     * @return array
     */
    public function getBedPreferences(): array
    {
        return $this->bed_preferences;
    }

    /**
     * @param array $bed_preferences
     * @return $this
     */
    public function setBedPreferences(array $bed_preferences): self
    {
        $this->bed_preferences = $bed_preferences;
        return $this;
    }

    /**
     * @return array
     */
    public function getBedtypePreferences(): array
    {
        return $this->bedtype_preferences;
    }

    /**
     * @param array $bedtype_preferences
     * @return $this
     */
    public function setBedtypePreferences(array $bedtype_preferences): self
    {
        $this->bedtype_preferences = $bedtype_preferences;
        return $this;
    }

    /**
     * @return array
     */
    public function getBlockQuantities(): array
    {
        return $this->block_quantities;
    }

    /**
     * @param array $block_quantities
     * @return $this
     */
    public function setBlockQuantities(array $block_quantities): self
    {
        $this->block_quantities = $block_quantities;
        return $this;
    }

    /**
     * @return string
     */
    public function getBookerAddress(): string
    {
        return $this->booker_address;
    }

    /**
     * @param string $booker_address
     * @return $this
     */
    public function setBookerAddress(string $booker_address): self
    {
        $this->booker_address = $booker_address;
        return $this;
    }

    /**
     * @return string
     */
    public function getBookerCity(): string
    {
        return $this->booker_city;
    }

    /**
     * @param string $booker_city
     * @return $this
     */
    public function setBookerCity(string $booker_city): self
    {
        $this->booker_city = $booker_city;
        return $this;
    }

    /**
     * @return string
     */
    public function getBookerCompany(): string
    {
        return $this->booker_company;
    }

    /**
     * @param string $booker_company
     * @return $this
     */
    public function setBookerCompany(string $booker_company): self
    {
        $this->booker_company = $booker_company;
        return $this;
    }

    /**
     * @return string
     */
    public function getBookerFirstname(): string
    {
        return $this->booker_firstname;
    }

    /**
     * @param string $booker_firstname
     * @return $this
     */
    public function setBookerFirstname(string $booker_firstname): self
    {
        $this->booker_firstname = $booker_firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getBookerIp(): string
    {
        return $this->booker_ip;
    }

    /**
     * @param string $booker_ip
     * @return $this
     */
    public function setBookerIp(string $booker_ip): self
    {
        $this->booker_ip = $booker_ip;
        return $this;
    }

    /**
     * @return string
     */
    public function getBookerLanguage(): string
    {
        return $this->booker_language;
    }

    /**
     * @param string $booker_language
     * @return $this
     */
    public function setBookerLanguage(string $booker_language): self
    {
        $this->booker_language = $booker_language;
        return $this;
    }

    /**
     * @return string
     */
    public function getBookerLastname(): string
    {
        return $this->booker_lastname;
    }

    /**
     * @param string $booker_lastname
     * @return $this
     */
    public function setBookerLastname(string $booker_lastname): self
    {
        $this->booker_lastname = $booker_lastname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBookerZip()
    {
        return $this->booker_zip;
    }

    /**
     * @param mixed $booker_zip
     * @return $this
     */
    public function setBookerZip($booker_zip): self
    {
        $this->booker_zip = $booker_zip;
        return $this;
    }

    /**
     * @return string
     */
    public function getCcCardholder(): string
    {
        return $this->cc_cardholder;
    }

    /**
     * @param string $cc_cardholder
     * @return $this
     */
    public function setCcCardholder(string $cc_cardholder): self
    {
        $this->cc_cardholder = $cc_cardholder;
        return $this;
    }

    /**
     * @return string
     */
    public function getCcCvc(): string
    {
        return $this->cc_cvc;
    }

    /**
     * @param string $cc_cvc
     * @return $this
     */
    public function setCcCvc(string $cc_cvc): self
    {
        $this->cc_cvc = $cc_cvc;
        return $this;
    }

    /**
     * @return string
     */
    public function getCcExpirationDate(): string
    {
        return $this->cc_expiration_date;
    }

    /**
     * @param DateTime $cc_expiration_date
     * @return $this
     */
    public function setCcExpirationDate(DateTime $cc_expiration_date): self
    {
        $this->cc_expiration_date = $cc_expiration_date->format('Y-m-d');
        return $this;
    }

    /**
     * @return string
     */
    public function getCcNumber(): string
    {
        return $this->cc_number;
    }

    /**
     * @param string $cc_number
     * @return $this
     */
    public function setCcNumber(string $cc_number): self
    {
        $this->cc_number = $cc_number;
        return $this;
    }

    /**
     * @return int
     */
    public function getCcType(): int
    {
        return $this->cc_type;
    }

    /**
     * @param int $cc_type
     * @return $this
     */
    public function setCcType(int $cc_type): self
    {
        $this->cc_type = $cc_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getComments(): string
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     * @return $this
     */
    public function setComments(string $comments): self
    {
        $this->comments = $comments;
        return $this;
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
     * @return $this
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return array
     */
    public function getExtras(): array
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
     * @return mixed
     */
    public function getForwardedUserAgent()
    {
        return $this->forwarded_user_agent;
    }

    /**
     * @param mixed $forwarded_user_agent
     * @return $this
     */
    public function setForwardedUserAgent($forwarded_user_agent): self
    {
        $this->forwarded_user_agent = $forwarded_user_agent;
        return $this;
    }

    /**
     * @return array
     */
    public function getGuestEmails(): array
    {
        return $this->guest_emails;
    }

    /**
     * @param array $guest_emails
     * @return $this
     */
    public function setGuestEmails(array $guest_emails): self
    {
        $this->guest_emails = $guest_emails;
        return $this;
    }

    /**
     * @return array
     */
    public function getGuestNames(): array
    {
        return $this->guest_names;
    }

    /**
     * @param array $guest_names
     * @return $this
     */
    public function setGuestNames(array $guest_names): self
    {
        $this->guest_names = $guest_names;
        return $this;
    }

    /**
     * @return array
     */
    public function getGuestQuantities(): array
    {
        return $this->guest_quantities;
    }

    /**
     * @param array $guest_quantities
     * @return $this
     */
    public function setGuestQuantities(array $guest_quantities): self
    {
        $this->guest_quantities = $guest_quantities;
        return $this;
    }

    /**
     * @return string
     */
    public function getHourOfArrival(): string
    {
        return $this->hour_of_arrival;
    }

    /**
     * @param string $hour_of_arrival
     * @return $this
     */
    public function setHourOfArrival(string $hour_of_arrival): self
    {
        $this->hour_of_arrival = $hour_of_arrival;
        return $this;
    }

    /**
     * @return array
     */
    public function getIncrementalPrices(): array
    {
        return $this->incremental_prices;
    }

    /**
     * @param array $incremental_prices
     * @return $this
     */
    public function setIncrementalPrices(array $incremental_prices): self
    {
        $this->incremental_prices = $incremental_prices;
        return $this;
    }

    /**
     * @return int
     */
    public function getNextTrips(): int
    {
        return $this->next_trips;
    }

    /**
     * @param int $next_trips
     * @return $this
     */
    public function setNextTrips(int $next_trips): self
    {
        $this->next_trips = $next_trips;
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options): self
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->request_id;
    }

    /**
     * @param string $request_id
     * @return $this
     */
    public function setRequestId(string $request_id): self
    {
        $this->request_id = $request_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getShowTest(): int
    {
        return $this->show_test;
    }

    /**
     * @param int $show_test
     * @return $this
     */
    public function setShowTest(int $show_test): self
    {
        $this->show_test = $show_test;
        return $this;
    }

    /**
     * @return array
     */
    public function getSmokingPreferences(): array
    {
        return $this->smoking_preferences;
    }

    /**
     * @param array $smoking_preferences
     * @return $this
     */
    public function setSmokingPreferences(array $smoking_preferences): self
    {
        $this->smoking_preferences = $smoking_preferences;
        return $this;
    }

    /**
     * @return int
     */
    public function getTestMode(): int
    {
        return $this->test_mode;
    }

    /**
     * @param bool $test_mode
     * @return $this
     */
    public function setTestMode(bool $test_mode): self
    {
        $this->test_mode = (int)$test_mode;
        return $this;
    }

    /**
     * @return string
     */
    public function getTravelPurpose(): string
    {
        return $this->travel_purpose;
    }

    /**
     * @param string $travel_purpose
     * @return $this
     */
    public function setTravelPurpose(string $travel_purpose): self
    {
        $this->travel_purpose = $travel_purpose;
        return $this;
    }

    /**
     * @return string
     */
    protected function getRequestMethod(): string
    {
        return self::REQUEST_METHOD_POST;
    }

    /**
     * @return array
     */
    protected function getAttributeMap(): array
    {
        return [
            /* required */
            'booker_telephone'    => 'array',
            'booker_country'      => 'string',
            'hotel_id'            => 'integer',
            'affiliate_id'        => 'integer',
            'block_ids'           => 'array',
            'checkin'             => 'string',
            'checkout'            => 'string',
            'booker_email'        => 'string',

            /* not required */
            'addon_prices'        => 'string',
            'affiliate_label'     => 'string',
            'bed_preferences'     => 'array',
            'bedtype_preferences' => 'array',
            'block_quantities'    => 'array',
            'booker_address'      => 'string',

            'booker_city'          => 'string',
            'booker_company'       => 'string',
            'booker_firstname'     => 'string',
            'booker_ip'            => 'string',
            'booker_language'      => 'string',
            'booker_lastname'      => 'string',
            'booker_zip'           => 'string',
            'cc_cardholder'        => 'string',
            'cc_cvc'               => 'string',
            'cc_expiration_date'   => 'string',
            'cc_number'            => 'string',
            'cc_type'              => 'string',
            'comments'             => 'string',
            'currency'             => 'string',
            'extras'               => 'array',
            'forwarded_user_agent' => 'string',
            'guest_emails'         => 'array',
            'guest_names'          => 'array',
            'guest_quantities'     => 'array',
            'hour_of_arrival'      => 'string',
            'incremental_prices'   => 'array',
            'next_trips'           => 'integer',
            'options'              => 'array',
            'request_id'           => 'string',
            'show_test'            => 'integer',
            'smoking_preferences'  => 'array',
            'test_mode'            => 'integer',
            'travel_purpose'       => 'string',
        ];
    }

    /**
     * @return bool
     */
    protected function isSecure(): bool
    {
        return true;
    }

    /**
     * @param $data
     * @return Result
     */
    protected function prepareResponse($data): Result
    {
        $collections = new Result();

        /** @var ProcessBooking $model */
        $class = $this->model();
        $model = new $class;
        $model->setAttributes((array)$data);

        $collections->addItem($model, $model->getPrimaryKey());
        return $collections;
    }

    /**
     * @return string
     */
    protected function model(): string
    {
        return ProcessBooking::class;
    }
}
