<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 08.03.17
 * Time: 20:03
 */

namespace app\models\api;


use yii\base\Model;

class Preview extends Model
{

    public $code;
    public $name;
    public $description;
    public $country;
    public $city;
    public $longitude;
    public $latitude;
    public $category;
    // public $reviews;
    public $price;
    public $view;

    private $limit;

    public function rules()
    {
        return [
            [['code', 'price',], 'integer'],
            [['longitude', 'latitude',], 'integer'],


        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => \Yii::t('app', 'Code'),
            'zone' => \Yii::t('app', 'Zone'),
            'rooms' => Yii::t('common', 'Status'),
            'access_token' => Yii::t('common', 'API access token'),
            'created_at' => Yii::t('common', 'Created at'),
            'updated_at' => Yii::t('common', 'Updated at'),
            'logged_at' => Yii::t('common', 'Last login'),
        ];
    }




}