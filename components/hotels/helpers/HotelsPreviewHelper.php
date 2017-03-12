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
use app\components\hotels\queries\HotelsApiQuery;
use yii\base\Component;

class HotelsPreviewHelper extends Component
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
    public $price;
    public $view;

    public $limit;
    public $from;
    public $to;
    public $availability;
    private $hotelCodes = [];
    private $hotels;



    public static function findHotels($availability, array $limits=null)
    {
        $model = new self;

        if($limits && is_array($limits)){
            $model->from = $limits['from'];
            $model->to = $limits['to'];
            $model->limit = $model->to - $model->from;
        }
        $model->availability = $availability;

        if($model->preview) {
            return $model->preview;
        } return false;

    }

    public function getPreview()
    {
        $this->hotelCodes = $this->getHotelCodes();
        $this->hotels = $this->getHotels();
        foreach ($this->hotels->hotels as $hotel){

           $preview[] = $this->getHotelPreview($hotel);
        }
        if($preview){

            return $preview;
        }
        return false;

    }

    private function getHotelCodes()
    {
        if($this->availability && is_object($this->availability)){
            foreach ($this->availability->hotels->hotels as $hotel){
                $average =($hotel->maxRate+$hotel->minRate)/2;
                $hotelData['code'] = $hotel->code;
                $hotelData['price'] = $average.' '.$hotel->currency;

                $searchData[] = $hotelData;
            }

            return $searchData ? $searchData : false;
        }
        return false;

    }

    private function getHotels()
    {

        if($this->hotelCodes){
            $codes = array_column($this->hotelCodes, 'code');
            $hotels = ApiClient::query(HotelsApiQuery::className())
                ->addParams([
                    'codes'=>implode(', ',$codes),
                ])
                ->get()
                ->response();
        }
        return $hotels;
    }

    protected function getHotelPreview($hotel)
    {

        if($hotel) {

            foreach($this->hotelCodes as $hotelCode){
                if($hotelCode['code']==$hotel->code){
                    $price = $hotelCode['price'];
                }
            }


            return [
                'code'=>$hotel->code,
                'name'=>$hotel->name->content,
                'description'=>$hotel->description->content,
                'country'=>$hotel->countryCode,
                'city'=>$hotel->city->content,
                'longitude'=>$hotel->coordinates->longitude,
                'latitude'=>$hotel->coordinates->latitude,
                'category'=>$this->getCategory($hotel->categoryCode),
                'price' => $price,
                'view'=>self::IMAGE_URL.$this->generalView($hotel->images),
                //'facilities' => $this->getFacilities($hotel->facilities)
            ];

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
            if($image->imageTypeCode == 'GEN')
            $genImages[] = $image;
        }

        if(isset($genImages)) {
            return $genImages[0]->path;
        } else
            return false;
    }

    private function getFacilities($hotelFacilities)
    {

        foreach ($hotelFacilities as $facility) {
            $facilities[] = [
                'code' => $facility->facilityCode,
                'facilityGroupCode' => $facility->facilityGroupCode,

            ];
        }

        return FacilityHelper::findFacilities($facilities);
    }



    public function getView()
    {
        return self::IMAGE_URL.$this->view;
    }
}