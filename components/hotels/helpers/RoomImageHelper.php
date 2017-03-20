<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 19.03.17
 * Time: 18:42
 */

namespace app\components\hotels\helpers;


use app\components\hotels\ApiClient;
use app\components\hotels\queries\HotelApiQuery;
use yii\base\Component;

class RoomImageHelper extends Component
{
    public $roomCode;
    public $hotelCode;

    private $hotel;
    private $roomImages;

    public static function findImages($roomCode, $hotelcode)
    {
        $model = new self;

        $model -> setRoomAndHotel($roomCode, $hotelcode);


        if($model->images) {
            return $model->images;
        } return false;

    }

    public function setRoomAndHotel($roomCode, $hotelCode)
    {
        $this->getHotelImages($roomCode, $hotelCode);
    }

    private function getHotelImages($roomCode, $hotelCode)
    {
        $this->getHotel($hotelCode);
        $this->getRoomImages($roomCode);
    }

    public function getImages()
    {
        return $this->roomImages;
    }


    private function getHotel($hotelCode)
    {
        $this->hotel = ApiClient::query(HotelApiQuery::className())
            ->setHotel($hotelCode)
            ->get()
            ->response();

        return $this->hotel;
    }

    private function getRoomImages($roomCode){
        foreach ($this->hotel->images as $image){
            if($image->roomCode == $roomCode){
                $this->roomImages[] = $image;
            }
        }
    }

}