<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 12.03.17
 * Time: 22:37
 */

namespace app\modules\main\components\widgets;


use app\components\hotels\ApiClient;
use app\components\hotels\queries\types\AccomodationsQuery;
use app\components\hotels\queries\types\FacilitiesQuery;
use yii\bootstrap\Widget;

class Facilities extends Widget
{
    public $model;
    public $facility;


    public function init()
    {
        parent::init();
        if(\Yii::$app->cache->get('facilities')){
            $this->model = \Yii::$app->cache->get('facilities');
        } else {
            $this->model = ApiClient::query(FacilitiesQuery::className())
                ->get()
                ->asArray();
             \Yii::$app->cache->set('facilities', $this->model);

        }

        $this->facility = explode(',', $this->facility);

    }

    public function run()
    {

        parent::run(); // TODO: Change the autogenerated stub

        return $this->render('facilities', [
           'model' => $this->model,
           'facilities' => $this->facility
        ]);
    }
}