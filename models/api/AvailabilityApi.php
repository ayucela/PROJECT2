<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 06.03.17
 * Time: 18:15
 */

namespace app\models\api;


use app\components\hotels\ApiClient;
use app\components\hotels\helpers\HotelGridPreview;
use app\components\hotels\helpers\HotelsPreviewHelper;
use app\components\hotels\queries\availability\Destination;
use app\components\hotels\queries\availability\Occupancies;
use app\components\hotels\queries\availability\Stay;
use app\components\hotels\queries\AvailabilityApiQuery;
use app\components\hotels\queries\HotelApiQuery;
use yii\base\Model;

class AvailabilityApi extends Model implements ApiModelInterface
{
    public $destination;
    /**
     * @var string $dateFrom
     */
    public $date_from;
    /**
     * @var string $dateTo
     */
    public $date_to;
    /**
     * @var string $rooms
     */
    public $rooms;
    /**
     * @var string $adults
     */
    public $adults;
    /**
     * @var string $kids
     */
    public $children;

    public function rules()
    {
        return [
            [['rooms', 'adults', 'children'], 'integer'],
            [['destination', 'date_from', 'date_to'], 'string'],
        ];
    }



    public function response()
    {
      // dd(\DateTime::createFromFormat("m/d/Y", $this->date_from));
        $apiResponse = ApiClient::query(AvailabilityApiQuery::className())
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


        if($apiResponse && is_object($apiResponse)){

            return $this->hotelDetails($apiResponse);

        } else {
            return false;
        }
    }

    private function hotelDetails($apiResponse){


            $hotelsPreviews[] = HotelsPreviewHelper::findHotels($apiResponse);

        return $hotelsPreviews;

    }

}