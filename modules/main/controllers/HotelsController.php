<?php

namespace app\modules\main\controllers;

use app\components\hotels\ApiClient;
use app\components\hotels\availability\AvailabilityOptionsInterface;
use app\components\hotels\ContentApiClient;
use app\components\hotels\helpers\FacilityHelper;
use app\components\hotels\hotel\Hotel;
use app\components\hotels\HotelsSearch;
use app\components\hotels\queries\availability\Occupancies;
use app\components\hotels\queries\AvailabilityApiQuery;
use app\components\hotels\queries\HotelApiQuery;
use app\components\hotels\queries\HotelsApiQuery;
use app\components\hotels\queries\types\AccomodationsQuery;
use app\components\hotels\queries\types\CountriesQuery;
use app\components\hotels\queries\types\DestinationsQuery;
use app\components\hotels\queries\types\FacilitiesQuery;
use app\models\api\AvailabilityApi;
use app\models\api\HotelsApi;
use app\models\search\CountrySearch;
use app\modules\main\components\filter\FilterFactory;
use app\modules\main\components\filter\PriceFilter;
use app\modules\main\models\BookingForm;
use app\modules\main\models\MainSearchForm;
use app\modules\main\models\PreviewForm;
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
use yii\data\Sort;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;
use Zend\Json\Server\Exception\HttpException;


/**
 * Hotelbeds API controller
 */
class HotelsController extends Controller
{
    const LIST_VIEW = 5;
    const GRID_VIEW = 6;
    const BLOCK_VIEW = 9;

    /**
     * Search and filter hotels
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSearch($view=null, array $sort=null, array $filter = null)
    {
        $session=\Yii::$app->session;
        $cache = \Yii::$app->cache;
        if($session['main_form']){
            $params = $session['main_form'];
            unset($session['main_form']);
        }


        $view = $this->getSearchView($view);

        if(\Yii::$app->request->post()) {
                $params = \Yii::$app->request->post();
        }

        if($params) {

            if($params && is_array($params)) {
                $model = new PreviewForm();
                if ($model->load($params)) {

                    try {
                        $model->prepare();

                    } catch (Exception $e){
                        throw $e;
                    }


                }
                $cache->set('model', $model);
            }

        } else {
            $model = $cache->get('model');

        }

        $session->set('preview-main', $model->getMainAttributes());
        $sort = new Sort([
            'attributes' => [
                'name' => ['default' => SORT_ASC],
                'price' => ['default' => SORT_ASC],
                'category' => ['default' => SORT_DESC]

            ],
        ]);
        //dd($model);

        return $this->render('search', [
           'model' => $model,
           'viewType' => $view,
           'sort' => $sort
        ]);
    }

    public function actionView($code)
    {

        $hotel = \Yii::createObject([
            'class' => Hotel::className(),
            'code' => $code
        ]);
        $hotel->setHotelParams();
        \Yii::$app->session->set('hotel', $hotel);

        return $this->render('view', compact('hotel'));
    }

    public function actionBooking($rateKey, $paymentType, $date_from, $date_to, $rooms, $adults, $children, $name,
                                  $hotelCode, $roomCode, $price )

    {

        if($paymentType == 'AT_WEB') {
            $model = new BookingForm([
                'scenario'=>'AT_WEB',
                'rateKey' => $rateKey
            ]);
        } elseif ($paymentType == 'IN_HOTEL'){
            $model = new BookingForm();
        }
        $hotel = ApiClient::query(HotelApiQuery::className())
            ->setHotel($hotelCode)
            ->get()
            ->response();

        $time1 = new  \DateTime($date_from);

        $time2 = new  \DateTime($date_to);

        $diff = $time1->diff($time2);
        $nights = $diff->days;
       // dd($hotel);
        if($model->load(\Yii::$app->request->post())){
            $response = $model->send();

            \Yii::$app->session->set('booking', $response);
            return $this->redirect('/main/hotels/booking-confirm');
        }
        return $this->render('booking', compact('model', 'paymentType', 'date_from', 'date_to',
            'hotel', 'rooms', 'adults', 'children', 'name', 'roomCode', 'nights', 'price'));
    }

    public function actionBookingConfirm()
    {
        $response = \Yii::$app->session->get('booking');
        if ($response->booking->status == "CONFIRMED") {
            // unset(\Yii::$app->session['booking']);
            $hotel = ApiClient::query(HotelApiQuery::className())
                ->setHotel($response->booking->hotel->code)
                ->get()
                ->response();
            return $this->render('booking-confirm', compact('response', 'hotel'));
        } else {
            return $this->render('booking-fail', compact('response', 'hotel'));
        }
    }

    public function actionSlideshowAjax($hotelCode)
    {

        $client =ApiClient::query(HotelApiQuery::className())
            ->setHotel($hotelCode)
            ->get()
            ->response();
        $images =  $client->images;




        return $this->renderAjax('slideshow-ajax', compact('images'));
    }





    public function actionApiTest()
    {

       $client = ApiClient::query(HotelApiQuery::className())
           ->setHotel(113220)
           ->get()
           ->response();

        dd($client);
    }

    private function getSearchView($view=null)
    {
        if(!$view) {
            $viewType = '_search-list';
        } else
            $viewType = $view;

        switch($viewType){
            case '_search-list': $perPage = self::LIST_VIEW;
                break;
            case '_search-grid': $perPage = self::GRID_VIEW;
                break;
            case '_search-block': $perPage = self::BLOCK_VIEW;
                break;
            default: $perPage = self::LIST_VIEW;
        }

        return [
            'name' => $viewType,
            'perPage' =>$perPage
        ];
    }



}
