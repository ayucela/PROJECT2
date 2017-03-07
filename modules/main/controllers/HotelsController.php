<?php

namespace app\modules\main\controllers;

use app\components\hotels\ApiClient;
use app\components\hotels\availability\AvailabilityOptionsInterface;
use app\components\hotels\ContentApiClient;
use app\components\hotels\HotelsSearch;
use app\components\hotels\queries\availability\Occupancies;
use app\components\hotels\queries\AvailabilityApiQuery;
use app\components\hotels\queries\HotelApiQuery;
use app\components\hotels\queries\HotelsApiQuery;
use app\models\api\AvailabilityApi;
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
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSearch()
    {

        $params = \Yii::$app->request->get();
       // dd($params);
        $availability = new AvailabilityApi();
        if($availability->load($params)){
            dd($availability->response());
            $dataProvider = new ArrayDataProvider([
                'allModels' => $availability->response()
            ]);

        }





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
       $client = ApiClient::query(AvailabilityApiQuery::className())
                     ->addDestination(new \app\components\hotels\queries\availability\Destination([
                         'code' =>  'PMI'
                     ]))
                     ->addStay(new \app\components\hotels\queries\availability\Stay([
                        'checkIn' => '2017-03-09',
                        'checkOut'=> '2017-03-11',

                     ]))
                     ->addOccupancies(new Occupancies([
                         'rooms'=>1,
                         'adults'=>2,
                         'children'=>0
                     ]))
                     ->post()
                     ->response();
        dd($client);

    }

}
