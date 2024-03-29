<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 19.03.17
 * Time: 11:56
 */

namespace app\modules\main\components\widgets;


use app\modules\main\models\RoomsForm;
use kartik\widgets\Widget;

class Rooms extends Widget
{
    public $model;
    public $hotelCode;



    public function init()
    {
        $this->model = new RoomsForm();
        $this->model->hotelCode = $this->hotelCode;
        parent::init();
    }

    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub

        if(\Yii::$app->session->get('preview-main')){
            $params = [
                'RoomsForm' => \Yii::$app->session->get('preview-main')
            ];
            unset($params['RoomsForm']['destination']);
        }



        if(\Yii::$app->request->post() && !empty(\Yii::$app->request->post())){
            $params = \Yii::$app->request->post();
            unset(\Yii::$app->session['preview-main']);
        }




        if($params){

            if($this->model->load($params)){

               $this->model->rooms();



            }
        }

        return $this->render('rooms', [
           'model' => $this->model,
        ]);

    }



}