<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 08.03.17
 * Time: 19:33
 */

namespace app\modules\main\models;


use app\components\hotels\ApiClient;
use app\components\hotels\helpers\HotelsPreviewHelper;
use app\components\hotels\queries\availability\Destination;
use app\components\hotels\queries\availability\Occupancies;
use app\components\hotels\queries\availability\Stay;
use app\components\hotels\queries\AvailabilityApiQuery;
use yii\base\Model;

class PreviewForm extends Model
{
    const SORT_BY_NAME = 1;
    const SORT_BY_PRICE = 2;
    const SORT_BY_RATING = 3;
    const SORT_BY_POPULARITY = 4;

    public $destination;
    public $destinationCode;
    public $destinationZone;
    public $hotel;
    public $rooms;
    public $adults;
    public $children;
    //public $paxes;
    public $date_from;
    public $date_to;
    public $price_from;
    public $price_to;
    public $userRating;
    public $accomodation;
    public $amenity;
    public $language;


    private $hotels;

    public function rules()
    {
        return [
            [['destination', 'date_from', 'date_to', 'language'], 'string'],
            [['destinationZone', 'hotelCode','rooms', 'adults', 'children', 'price_from',
              'price_to', 'userRating', 'accomodation', 'amenity'], 'integer'],
            [['destination', 'date_from', 'date_to', 'rooms', 'adults', 'children'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'destination' => \Yii::t('app', 'Destination'),
            'destinationCode' => \Yii::t('app', 'Code'),
            'destinationZone' => \Yii::t('app', 'Zone'),
            'hotelCode'=> \Yii::t('app', 'Hotel Code'),
            'rooms' => \Yii::t('app', 'Rooms'),
            'adults'=> \Yii::t('app', 'Adults'),
            'children' => \Yii::t('app', 'Children'),
            'checkIn' => \Yii::t('app', 'Check In'),
            'checkOut' => \Yii::t('app', 'Check Out'),
            'price_from' => \Yii::t('app', 'Price From'),
            'price_to' => \Yii::t('app', 'Price To'),
            'userRating' => \Yii::t('app', 'User Rating'),
            'accomodation' => \Yii::t('app', 'Accomodations'),
            'amenity'=>\Yii::t('app', 'Amenity'),
            'language'=>\Yii::t('app', 'Language')
        ];
    }

    public function preview()
    {
        return HotelsPreviewHelper::findHotels($this->availability());

    }

    private function availability()
    {

        return  ApiClient::query(AvailabilityApiQuery::className())
            ->addDestination(new Destination([
                'code' => $this->destination
            ]))
            ->addStay(new Stay([
                'checkIn' => $this->date_from,
                'checkOut'=> $this->date_to,
            ]))
            ->addOccupancies(new Occupancies([
                'rooms'=>$this->rooms,
                'adults'=>$this->adults,
                'children'=>$this->children
            ]))
            ->post()
            ->response();
    }


}