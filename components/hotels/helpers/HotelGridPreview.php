<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 07.03.17
 * Time: 7:17
 */

namespace app\components\hotels\helpers;


use app\components\hotels\ApiClient;
use app\components\hotels\queries\HotelApiQuery;
use yii\base\Component;

class HotelGridPreview extends Component
{
    const IMAGE_URL = 'http://photos.hotelbeds.com/giata/';

    public $code;
    public $name;
    public $description;
    public $country;
    public $city;
    public $longitude;
    public $latitude;
    public $category;
   // public $reviews;
   // public $price;
    public $view;

    //protected $hotel;


    public static function findHotel($code)
    {
        $model = new self;

        if($model->setHotel($code)) {
            return $model;
        } return false;

    }

    public function setHotel($code)
    {

        $this->code = $code;

        $hotel = ApiClient::query(HotelApiQuery::className())
            ->setHotel($this->code)
            ->get()
            ->response();


        if($hotel){


            if($this->getHotelData($hotel)){
                return true;
            }
        }
        return false;
    }

    protected function getHotelData($hotel)
    {

        if($hotel) {
            $this->name = $hotel->name->content;
            $this->description = $hotel->description->content;
            $this->country = $hotel->country->description->content;
            $this->city = $hotel->city->content;
            $this->longitude = $hotel->coordinates->longitude;
            $this->latitude = $hotel->coordinates->latitude;
            $this->category = $this->getCategory($hotel->category->code);
            $this->view = $this->generalView($hotel->images);

            return true;

        } else
            return false;
    }
    protected function getCategory($category){
        return $category[0];
    }

    protected function generalView($images)
    {
        foreach ($images as $image)
        {
            if($image->type->code == 'GEN')
            $genImages[] = $image;
        }

        if(isset($genImages)) {
            return $genImages[0]->path;
        } else
            return false;
    }


    public function getView()
    {
        return self::IMAGE_URL.$this->view;
    }
}