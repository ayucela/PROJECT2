<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 18.03.17
 * Time: 7:04
 */

namespace app\components\hotels\hotel;

use app\components\hotels\ApiClient;
use app\components\hotels\helpers\FacilityHelper;
use app\components\hotels\queries\ApiQueryInterface;
use app\components\hotels\queries\HotelApiQuery;
use yii\base\Component;

class Hotel extends Component
{
    const IMAGES_BIG_URL = 'http://photos.hotelbeds.com/giata/bigger/';
    const IMAGES_URL = 'http://photos.hotelbeds.com/giata/';
    const IMAGES_SMALL_URL = 'http://photos.hotelbeds.com/giata/small/';

    public $code;
    public $name;
    public $description;
    public $type;
    public $chain;
    public $ratingStar;
    public $boards =[];
    public $country;
    public $city;
    public $address;
    public $phones =[];
    public $checkIn;
    public $checkOut;
    public $cancellation;
    public $facilities =[];
    public $images = [];
    public $latitude;
    public $longitude;

    private $hotel;

    public function setHotelParams(ApiQueryInterface $hotel=null)
    {
        if (!$hotel) {

            if ($this->code) {

                $hotel = ApiClient::query(HotelApiQuery::className())
                    ->setHotel($this->code)
                    ->get()
                    ->response();



            }

            $this->code = $hotel->code;
            $this->name = $hotel->name->content;
            $this->description = $hotel->description->content;
            $this->country = $hotel->country->description->content;
            $this->type = $hotel->accommodationType->code;
            $this->ratingStar = $hotel->category->code;
            $this->city = $hotel->city->content;
            $this->chain = $hotel->chain->description->content;
            $this->boards = $hotel->boards;
            $this->address = $hotel->address->content;
            $this->phones = $hotel->phones;
            $this->facilities = $this->hasFacilities($hotel->facilities);
            $this->images = $hotel->images;
            $this->longitude = $hotel->coordinates->longitude;
            $this->latitude = $hotel->coordinates->latitude;
        }
    }

    public function asArray()
    {
        return $this->attributes;
    }

    private function hasFacilities($facilities)
    {
        $hasFacilites =[];
        foreach($facilities as $facility){
            if($facility->indLogic){
                $hasFacilites[]= $facility;
            }
        }
        return $hasFacilites;
    }

}