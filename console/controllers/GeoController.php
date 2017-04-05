<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 30.03.17
 * Time: 9:25
 */

namespace app\console\controllers;


use app\components\hotels\ApiClient;
use app\components\hotels\queries\availability\Destination;
use app\components\hotels\queries\types\CountriesQuery;
use app\components\hotels\queries\types\DestinationsQuery;
use app\models\Country;
use app\models\Zone;
use yii\console\Controller;
use yii\console\Exception;

class GeoController extends Controller
{
    public function actionGetCountries()
    {
        $response = ApiClient::query(CountriesQuery::className())
            ->addParams([
                'from' => '1',
                'to' => '200'
            ])
            ->get()
            ->response();
        if($response) {
            foreach ($response->countries as $item) {
                $country = new Country();
                $country->code = $item->code;
                $country->name_en = $item->description->content;
                $country->save();
            }
        } else
            throw new Exception('No Api data');
    }


    public function actionGetDestinations()
    {
        for($i = 3474; $i <= 5000; $i=$i+1000) {
            $response = ApiClient::query(DestinationsQuery::className())
                ->addParams([
                    'from' => $i,
                    'to' => $i + 999
                ])
                ->get()
                ->response();


            if ($response) {


                foreach ($response->destinations as $item) {
                    $country = Country::find()
                        ->where(['code' => $item->countryCode])
                        ->one();
                    $destination = new \app\models\Destination();
                    $destination->country_id = $country->id ? $country->id : null;
                    $destination->country_code = $item->countryCode ? $item->countryCode : null;
                    $destination->code = $item->code ? $item->code : null;
                    $destination->name_en = $item->name->content ? $item->name->content : null;
                    if (!$destination->save()) {
                        throw new Exception('Destination not saved');
                    }
                    if ($item->zones) {
                        foreach ($item->zones as $zone) {
                            $zoneModel = new Zone();
                            $zoneModel->destination_id = $destination->id ? $destination->id : null;
                            $zoneModel->destination_code = $item->code ? $item->code : null ;
                            $zoneModel->name_en = $zone->name ? $zone->name : null;
                            if (!$zoneModel->save()) {
                                throw new Exception('Zone not saved');
                            }
                        }
                    }

                }


            } else
                throw new Exception('No Api data');
        }
        sleep(6);
    }

}