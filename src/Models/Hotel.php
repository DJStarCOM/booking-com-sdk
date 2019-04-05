<?php

namespace DJStarCOM\BookingComSDK\Models;

use stdClass;

/**
 * Class Hotel
 * @package DJStarCOM\BookingComSDK\Models
 */
class Hotel extends Model
{
    /**
     * Hotel specific information.
     *
     * @var stdClass
     */
    protected $hotel_data;

    /**
     * This block has room data for this hotel.
     *
     * @var array
     */
    protected $room_data;

    /**
     * Unique ID to represent this hotel.
     *
     * @var integer
     */
    protected $hotel_id;

    /**
     * Collection primary key
     * @return int
     */
    public function getPrimaryKey(): int
    {
        return $this->hotel_id;
    }

    /**
     * Hotel specific information.
     * @return stdClass
     */
    public function getHotelData(): stdClass
    {
        return $this->hotel_data;
    }

    /**
     * This block has room data for this hotel.
     * @return array
     */
    public function getRoomData(): array
    {
        return $this->room_data;
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
     * @return array
     */
    protected function getAttributeMap(): array
    {
        return [
            'hotel_data' => 'object',
            'room_data'  => 'array',
            'hotel_id'   => 'integer',
        ];
    }
}
