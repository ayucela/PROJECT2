<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 19.03.17
 * Time: 11:57
 */

namespace app\modules\main\models;


use app\components\hotels\ApiClient;
use app\components\hotels\helpers\RoomFacilityHelper;
use app\components\hotels\hotel\Hotel;
use app\components\hotels\queries\availability\Hotels;
use app\components\hotels\queries\availability\Occupancies;
use app\components\hotels\queries\AvailabilityApiQuery;
use app\components\hotels\queries\HotelApiQuery;
use app\components\hotels\hotel\Room;
use hotelbeds\hotel_api_sdk\model\Stay;
use yii\base\Model;

class RoomsForm extends Model
{
    public $date_from;
    public $date_to;
    public $rooms;
    public $adults;
    public $children;
    public $hotelCode;


    private $availableRooms = [];
    private $responseRooms = [];



    public function rules()
    {
        return [
            [['date_from', 'date_to'], 'string'],
            [['rooms', 'adults', 'children'], 'integer'],
            [['date_from', 'date_to', 'rooms', 'adults', 'children'], 'required']
        ];
    }

    /**
     * @return array
     * Form field labels
     */
    public function attributeLabels()
    {
        return [
            'date_from' => \Yii::t('app', 'Check In'),
            'date_to' => \Yii::t('app', 'Check Out'),
            'rooms' => \Yii::t('app', 'Rooms'),
            'adults' => \Yii::t('app', 'Adults'),
            'children' => \Yii::t('app', 'Kids'),
        ];
    }

    public function setHotelCode($hotelCode)
    {
        $this->hotelCode = $hotelCode;
    }


    public function rooms()
    {
        $avaliability = $this->getAvailability();
        if($avaliability && is_object($avaliability)){
            $hotel = reset($avaliability->hotels->hotels);
            $this->responseRooms = $hotel->rooms;
            $this->getHotelRooms();
            return true;
        } else
            return false;
    }

    public function getAvailableRooms()
    {
        return $this->availableRooms;
    }

    private function getHotelRooms()
    {
        if($this->responseRooms && is_array($this->responseRooms)){
            foreach($this->responseRooms as $room){
                $this->availableRooms[] = \Yii::createObject([
                    'class' => Room::className(),
                    'date_from' => $this->date_from,
                    'date_to' => $this->date_to,
                    'rooms' => $this->rooms,
                    'adults' => $this->adults,
                    'children' => $this->children,
                    'hotelCode' => $this->hotelCode,
                    'roomCode' => $room->code,
                    'name' =>$room->name,
                    'rates' => $room->rates
                ]);

            }
        }
    }

    private function getAvailability()
    {

        $dateFrom = \DateTime::createFromFormat("m/d/Y", $this->date_from);
        $dateTo = \DateTime::createFromFormat("m/d/Y", $this->date_to);
        return ApiClient::query(AvailabilityApiQuery::className())
            ->addHotels(new Hotels([
                'hotel' => [$this->hotelCode]
            ]))
            ->addStay(new \app\components\hotels\queries\availability\Stay([
                'checkIn' => $dateFrom->format('Y-m-d'),
                'checkOut' => $dateTo->format('Y-m-d'),
            ]))
            ->addOccupancies(new Occupancies([
                'rooms' => $this->rooms,
                'adults' => $this->adults,
                'children' => $this->children
            ]))
            ->post()
            ->response();
    }




}