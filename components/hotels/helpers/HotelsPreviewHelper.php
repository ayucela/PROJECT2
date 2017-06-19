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
use Zend\Json\Server\Exception\HttpException;

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

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }


    public static function findHotels($availability, array $limits=null)
    {
        $model = new self;

        if($limits && is_array($limits)){
            $model->from = $limits['from'];
            $model->to = $limits['to'];
            $model->limit = $model->to - $model->from;
        }
        $model->availability = $availability;
       // dd($model);
        if($model->preview) {
            return $model->preview;
        } return false;

    }

    public function getPreview()
    {
        $this->hotelCodes = $this->getHotelCodes();
        $this->hotels = $this->getHotels();

        if (isset($this->hotels->hotels)) {
            foreach ($this->hotels->hotels as $hotel){

                $preview[] = $this->getHotelPreview($hotel);
            }
        }

        if(isset($preview)) {

            return $preview;
        }

        return false;

    }

    private function getHotelCodes()
    {
        if(isset($this->availability->hotels->hotels)) {
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
        $hotels = new \stdClass();

        if($this->hotelCodes !== false) {
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

            $price = 0;
            $currency = '';

            foreach($this->hotelCodes as $hotelCode){
                if($hotelCode['code']==$hotel->code){
                    $price = $hotelCode['price'];
                }
            }

            if (is_string($price) && strripos($price, ' ')) {
                $explodedPrice = explode(' ', $price);

                $price = isset($explodedPrice[0]) ? $explodedPrice[0] : $price;
                $currency = isset($explodedPrice[1]) ? $explodedPrice[1] : $currency;
            }

            return [
                'code' => isset($hotel->code) ? $hotel->code : '',
                'name' => isset($hotel->name) && isset($hotel->name->content) ? $hotel->name->content : '',
                'accommodation' => isset($hotel->accommodationTypeCode) ? $hotel->accommodationTypeCode : '',
                'description' => isset($hotel->description) && isset($hotel->description->content) ? $hotel->description->content : '',
                'country' => isset($hotel->countryCode) ? $hotel->countryCode : '',
                'city' => isset($hotel->city) && isset($hotel->city->content) ? $hotel->city->content : '',
                'longitude' => isset($hotel->coordinates) && isset($hotel->coordinates->longitude) ? $hotel->coordinates->longitude : '',
                'latitude' => isset($hotel->coordinates) && isset($hotel->coordinates->latitude) ? $hotel->coordinates->latitude : '',
                'category' => (isset($hotel->countryCode) ? $hotel->countryCode : ''),
                'price' => $price,
                'currency' => $currency,
                'view' => self::IMAGE_URL.$this->generalView($hotel->images),
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
        if($images && is_array($images)) {

            foreach ($images as $image) {
                if ($image->imageTypeCode == 'GEN')
                    $genImages[] = $image;
            }

            if (isset($genImages)) {
                return $genImages[0]->path;
            } else
                return false;
        }

        return false;

//        throw new \yii\web\HttpException(404, 'No images found');
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