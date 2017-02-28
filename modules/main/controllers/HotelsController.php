<?php

namespace app\modules\main\controllers;

use app\components\hotels\HotelsSearch;
use app\models\api\HotelsApi;
use app\modules\main\models\MainSearchForm;
use hotelbeds\hotel_api_sdk\helpers\Availability;
use hotelbeds\hotel_api_sdk\HotelApiClient;
use hotelbeds\hotel_api_sdk\model\Destination;
use hotelbeds\hotel_api_sdk\model\Filter;
use hotelbeds\hotel_api_sdk\model\Hotels;
use hotelbeds\hotel_api_sdk\model\Occupancy;
use hotelbeds\hotel_api_sdk\model\Stay;
use hotelbeds\hotel_api_sdk\types\ApiVersion;
use hotelbeds\hotel_api_sdk\types\ApiVersions;
use yii\base\Exception;
use yii\data\ArrayDataProvider;
use yii\helpers\VarDumper;
use yii\web\Controller;
use Zend\Json\Server\Exception\HttpException;


/**
 * Hotelbeds API controller
 */
class HotelsController extends Controller
{
    /**
     * Hotelbeds API return action
     * @return string
     */
    public function actionResult()
    {

        dd(\Yii::$app->request->post());
    }

    /**
     * Search and filter hotels
     * @return string
     */
    public function actionSearch()
    {

        $params = \Yii::$app->request->queryParams;
        $search = new HotelsSearch($params);

        $hotels = new HotelsApi();
        $hotels->search = $search;

        $hotels = $hotels->call();


        $dataProvider = new ArrayDataProvider([
                'allModels' => $hotels
        ]);

        dd($dataProvider->models);

        return $this->render('search', [
           'dataProvider' => $dataProvider
        ]);

    }

    public function actionApiTest()
    {
        $config = \Yii::$app->hotels;

        $apiClient = new HotelApiClient($config->url, $config->apiKey, $config->sharedSecret, new ApiVersion(ApiVersions::V1_0), $config->timeout);
        $rqData = new Availability();
        $rqData->stay = new Stay(\DateTime::createFromFormat("Y-m-d", "2017-02-26"),
            \DateTime::createFromFormat("Y-m-d", "2017-02-28"));

       // $rqData->destination = new Destination('USA');

        $rqData->hotels =[ "hotel" => [1067,1070,1075,135813,145214,1506,1508,1526,1533,1539,1550,161032,170542,182125,187939,212167,215417,228671,229318,23476] ];

        $occupancy = new Occupancy();
        $occupancy->adults = 2;
        $occupancy->children = 0;
        $occupancy->rooms = 1;
        $rqData->occupancies = [ $occupancy ];
        $rqData->filter = new Filter();

        $availRS = $apiClient->Availability($rqData);

        dd($availRS);


    }

}
