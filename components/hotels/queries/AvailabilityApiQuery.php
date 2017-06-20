<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 04.03.17
 * Time: 0:50
 */

namespace app\components\hotels\queries;



use app\components\hotels\queries\availability\Destination;
use app\components\hotels\queries\availability\Geolocation;
use app\components\hotels\queries\availability\Hotels;
use app\components\hotels\queries\availability\Occupancies;

use app\components\hotels\queries\availability\Review;
use app\components\hotels\queries\availability\Stay;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;

class AvailabilityApiQuery extends ApiQuery implements ApiQueryInterface
{
    const QUERY_PREFIX = '?';
    const QUERY_URL = '/hotel-api/1.0/hotels';

    public $stay;
    public $occupancies = [];
    public $destination;
    public $hotels;
    public $geolocation;
    public $reviews = [];
    public $language;

    private $body = [];

    public function addDestination(Destination $destination)
    {
        $this->destination = $destination;
        return $this;
    }

     public function addHotels(Hotels $hotels)
     {

         $this->hotels = $hotels;

         return $this;
     }

    public function addOccupancies(Occupancies $occupancies)
    {
         $this->occupancies[] = $occupancies;
         return $this;
    }

    public function addReview(Review $review)
    {
        $this->reviews[] = $review;
        return $this;
    }

    public function addGeolocation(Geolocation $geolocation)
    {
        $this->geolocation = $geolocation;
        return $this;

    }

    public function addStay(Stay $stay)
    {
        $this->stay =  $stay;
        return $this;
    }

    public function post()
    {

        $this->response = $this->curl->setRequestBody(json_encode($this->body()))
            ->post($this->getQueryString());

        return $this;
    }


    public function get(){

    }

    public function asArray()
    {
        $this->response = json_decode($this->response, $assoc = true);
        return $this;
        // TODO: Implement asArray() method.
    }

    public function response()
    {
        if(!is_array($this->response)){
            $this->response = json_decode($this->response);
        }
        // TODO: Implement response() method.
        return $this->response;
    }

    private function body()
    {

        foreach ($this->attributes as $key => $item){
            if($item){

                $this->body[$key] = $item;
            }
        }

        return $this->body;
    }

    protected function getQueryString()
    {
        return $this->url.self::QUERY_URL;
    }

}