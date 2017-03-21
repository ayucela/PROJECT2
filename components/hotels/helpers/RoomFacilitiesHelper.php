<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 20.03.17
 * Time: 20:15
 */

namespace app\components\hotels\helpers;


use app\components\hotels\ApiClient;
use app\components\hotels\queries\HotelApiQuery;
use yii\base\Component;

class RoomFacilitiesHelper extends Component
{
    public $hotelFacilities;
    private $hotel;
    private $rooms;
    private $hotel_code;
    private $roomCode;


    public static function findFacilities($hotel_code, $roomCode)
    {
        $model = new self;
        $model->hotelCode = $hotel_code;
        $model->roomCode = $roomCode;

        return $model->facilities();
    }
    public function setHotelCode($hotel_code)
    {
        $this->hotel_code = $hotel_code;
    }

    public function setRoomCode($roomCode)
    {
        $this->roomCode = $roomCode;
    }

    public function facilities()
    {
        $this->hotel = $this->findHotel($this->hotel_code);

        $this->rooms = $this->getRooms();

        return $this->getRoomFacilities();
    }



    private function findHotel($hotel_code)
    {
        return ApiClient::query(HotelApiQuery::className())
            ->setHotel($hotel_code)
            ->get()
            ->response();

    }

    private function getRooms()
    {

        if($this->hotel) {

            $rooms = $this->hotel->rooms;
        } else
            return false;

        return $rooms;
    }

    private function getRoomFacilities()
    {
        foreach ($this->rooms as $room){

            if($room->roomCode == $this->roomCode){

                $facilities= $room->roomFacilities;
            }
        }

        return $facilities;
    }
}