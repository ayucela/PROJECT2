<?php

namespace app\modules\main\controllers;

use app\components\hotels\ApiClient;
use app\components\hotels\availability\AvailabilityOptionsInterface;
use app\components\hotels\ContentApiClient;
use app\components\hotels\helpers\FacilityHelper;
use app\components\hotels\HotelsSearch;
use app\components\hotels\queries\availability\Occupancies;
use app\components\hotels\queries\AvailabilityApiQuery;
use app\components\hotels\queries\HotelApiQuery;
use app\components\hotels\queries\HotelsApiQuery;
use app\components\hotels\queries\types\AccomodationsQuery;
use app\components\hotels\queries\types\FacilitiesQuery;
use app\models\api\AvailabilityApi;
use app\models\api\HotelsApi;
use app\modules\main\components\filter\FilterFactory;
use app\modules\main\components\filter\PriceFilter;
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
           /* if($filter && isset($filter) && is_array($filter)) {
               $preview = FilterFactory::create($cache->get('start-preview'), $filter);

                $cache->set('preview', $preview);
                $filteredMinMax = $this->previewMinMax($preview);
                $cache->set('filtered-min-max', $filteredMinMax);
            }*/
        } else {
            $model = $cache->get('model');

        }

       // dd($filter);
       /* if($filter && isset($filter) && is_array($filter)){

            $filterParams = $filter;

            $preview = FilterFactory::create($cache->get('start-preview'), $filterParams);

            $cache->set('preview', $preview);
            $filteredMinMax = $this->previewMinMax($preview);
            $cache->set('filtered-min-max', $filteredMinMax);

        }*/

        return $this->render('search', [
           'model' => $model,
           'viewType' => $view,
        ]);
    }

    public function actionFilterAjax()
    {
        if(\Yii::$app->request->isAjax){
            $filterParams = \Yii::$app->request->get();

            dd($filterParams);
            $view = $filterParams['view'];
            unset($filterParams['view']);
            foreach ($filterParams as $key=>$value){

                if(!$value || !isset($value)){
                    $filterParams = null;
                }
            }

            return $this->redirect(['search',  'filter'=>$filterParams, 'view' => $view]);
        }
    }

    public function actionApiTest()
    {

       $client = ApiClient::query(AccomodationsQuery::className())
                    ->addParams([
                        'language'=>'ENG',
                        'from' => '1',
                        'to' => '500'
                    ])
                     ->get()
                     ->asArray();

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
