<?php

namespace app\modules\main\controllers;

use app\models\search\CountrySearch;
use app\models\search\DestinationSearch;
use app\modules\main\models\MainSearchForm;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;

/**
 * Default controller for the `main` module
 */
class SiteController extends Controller
{
    public function actions()
    {

        return [
           'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchForm = new MainSearchForm();


        if($searchForm->load(\Yii::$app->request->post())){
            $searchForm->send();
        }
       // VarDumper::dump('Test main');
        return $this->render('index', compact('searchForm'));
    }

    public function actionSearchAjax()
    {
        $response = \Yii::$app->request->post();
        if (\Yii::$app->request->isAjax) {
            $searchModel = new DestinationSearch();

            $dataProvider = $searchModel->search($response['search']);
            $destinations = $dataProvider->models;

            $result=[];
            $searchResult =[];
            foreach($destinations as $destination){
                $result['country'] = $destination->country;
                $result['destination'] = $destination;
                $searchResult[] = $result;
            }

            \Yii::$app->response->format = Response::FORMAT_JSON;
            return $searchResult;
        }
    }
}
