<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 26.02.17
 * Time: 6:42
 */

namespace app\components\hotels;
use hotelbeds\hotel_api_sdk\HotelApiClient;
use hotelbeds\hotel_api_sdk\model\Filter;
use hotelbeds\hotel_api_sdk\model\Occupancy;
use hotelbeds\hotel_api_sdk\model\Stay;
use League\Flysystem\Exception;
use yii\base\Object;

/**
 * Class Hotels init and call HotelBeds API
 * @package app\components\hotels
 *
 * @property HotelApiClient $apiClient
 * @property \hotelbeds\hotel_api_sdk\helpers\Availability $rqData
 *
 */

class Availability extends Object
{
    /**
     * @var
     */
    private $apiClient;
    /**
     * @var
     */
    private $rqData;
    /**
     * @var
     */
    private $stay;
    /**
     * @var
     */
    private $hotels;
    /**
     * @var
     */
    private $response;

    /**
     * class constructor
     * @param HotelsApi $api
     * @param array $config
     */
    public function __construct(HotelsApi $api, $config = null)
    {
        parent::__construct($config);
        $this->apiClient = $api->client;
        $this->rqData = new \hotelbeds\hotel_api_sdk\helpers\Availability();
    }

    /**
     * @param HotelsSearch $search
     */
    public function setSearch(HotelsSearch $search)
    {
        $this->rqData->stay = new Stay(\DateTime::createFromFormat("m/d/Y", $search->date_from),
            \DateTime::createFromFormat("m/d/Y", $search->date_to));
        $this->rqData->hotels = $search->hotels;
       //dd($search->kids);
        $occupancy = new Occupancy();
        $occupancy->adults = (int) $search->adults;
        $occupancy->children = (int) $search->kids;
        $occupancy->rooms = (int) $search->rooms;
        $this->rqData->occupancies = [$occupancy];

      /*  $this->rqData->filter = new Filter();
        $this->rqData->filter->maxHotels = (int)$search->filter->maxHotels;
        $this->rqData->filter->maxRooms = (int)$search->filter->maxRooms;
        $this->rqData->filter->maxRatesPerRoom = (int)$search->filter->maxRatesPerRoom;
        $this->rqData->filter->minRate = (float)$search->filter->minRate;
        $this->rqData->filter->maxRate = (float)$search->filter->maxRate;
        $this->rqData->filter->packaging = (boolean)$search->filter->packaging;
        $this->rqData->filter->paymentType = (string)$search->filter->paymentType;
        $this->rqData->filter->minCategory = (int)$search->filter->minCategory;
        $this->rqData->filter->maxCategory = (int)$search->filter->maxCategory;
      */
        $this->clientResponse();

    }

    private function clientResponse()
    {
        try {
            $this->response = $this->apiClient->Availability($this->rqData);
        } catch (\hotelbeds\hotel_api_sdk\types\HotelSDKException $e) {
            $auditData = $e->getAuditData();
            error_log( $e->getMessage() );
            error_log( "Audit remote data = ".json_encode($auditData->toArray()));
            exit();
        } catch (Exception $e) {
            error_log( $e->getMessage() );
            exit();
        }
        dd($this->response->hotels->iterator());
        foreach ($this->response->hotels->iterator() as $hotelCode => $hotelData)
        {
            dd($hotelData);
            // Get all hotel data (from Hotel object $hotelData)

            // Iterate all rooms of each hotel
            foreach ($hotelData->iterator() as $roomCode => $roomData)
            {
                dd($roomData);
                // Iterate all rate of each room
                foreach($roomData->rateIterator() as $rateKey => $rateData)
                {

                }
            }
        }
        $this->response->toArray();


    }

    public function getResponse()
    {

        return $this->response;
    }

    public function  getResponseArray()
    {
        return $this->response->toArray();
    }

    public function getHotels()
    {
        return $this->getResponseArray()['hotels']->hotels;
    }
}