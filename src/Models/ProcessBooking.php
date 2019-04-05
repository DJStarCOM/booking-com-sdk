<?php

namespace DJStarCOM\BookingComSDK\Models;

use stdClass;

class ProcessBooking extends Model
{
    /**
     * Prediction of booker's next trips
     * display conditionnext_trips=3
     * @var array of obj
     */
    protected $next_trips;

    /**
     * A four-digit number used in combination with the booking number to give the customer access to view,
     * modify or cancel their booking. In th test mode, this value will be '0000'.
     *
     * @var  string
     */
    protected $pincode;

    /**
     * Link to the google maps static map for this hotel's location.
     * It is only displayed for Windows 8.0 affiliate ids.
     * display conditionaffiliate_id=000000
     *
     * @var string
     */
    protected $gmaps_url;

    /**
     * A nine or ten digit number that uniquely identifies the booking that was just made.
     * In the test mode, this value will be '0'.
     *
     * @var int
     */
    protected $reservation_id;

    /**
     * display conditionextras=hotel_contact_info
     * @var object
     */
    protected $hotel_contact_info;

    /**
     * @return array of objects
     */
    public function getNextTrips(): ?array
    {
        return $this->next_trips;
    }

    /**
     * @return string
     */
    public function getPincode(): string
    {
        return $this->pincode;
    }

    /**
     * @return string
     */
    public function getGmapsUrl(): ?string
    {
        return $this->gmaps_url;
    }

    /**
     * @return int
     */
    public function getReservationId(): int
    {
        return $this->reservation_id;
    }

    /**
     * @return object
     */
    public function getHotelContactInfo(): stdClass
    {
        return $this->hotel_contact_info;
    }

    /**
     * @return array
     */
    protected function getAttributeMap(): array
    {
        return [
            'next_trips'         => 'array',
            'pincode'            => 'string',
            'gmaps_url'          => 'string',
            'reservation_id'     => 'integer',
            'hotel_contact_info' => 'object',
        ];
    }
}
