<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 11.03.17
 * Time: 17:06
 */

namespace app\components\hotels\helpers;


use app\components\hotels\ApiClient;
use app\components\hotels\queries\HotelApiQuery;
use app\components\hotels\queries\types\FacilitiesQuery;
use yii\base\Component;

class FacilityHelper extends Component
{
    public $hotelFacilities;
    private  $hotel;
    private $hotel_code;


    public static function findFacilities($hotel_code)
    {
        $model = new self;
        $model->hotel_code = $hotel_code;

        return $model->facilitiesName();
    }

    public function facilitiesName()
    {
        $this->hotel = $this->findHotel($this->hotel_code);
        return $this->getFacilitiesNames();
    }

    private function getFacilitiesNames()
    {
        $facilities = $this->hotel->facilities;

        foreach($facilities as $facility){

            $hotelFacilities[] = [
                'hotel_code' =>$this->hotel->code,
                'code' => $facility->facilityCode,
                'facilityGroupCode' => $facility->facilityGroupCode,
                'description' => $facility->description->content,
            ];
        }
        if($hotelFacilities) {

            return array_reverse($hotelFacilities);
        } else
            return false;

    }

    private function findHotel($hotel_code)
    {
        return ApiClient::query(HotelApiQuery::className())
            ->setHotel($hotel_code)
            ->get()
            ->response();

    }

}