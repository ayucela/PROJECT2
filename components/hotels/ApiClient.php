<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 03.03.17
 * Time: 23:03
 */

namespace app\components\hotels;


use app\components\hotels\queries\ApiQueryInterface;
use app\components\hotels\queries\QueryFactory;
use League\Uri\Interfaces\Query;
use linslin\yii2\curl\Curl;
use yii\base\Component;

/**
 * Class ClientApi
 * @package app\components\hotels
 * Hotelbeds Api
 * @property
 */

class ApiClient extends Component
{
    const QUERY_PREFIX = '?';

    public static function query($apiQueryClass){
        return \Yii::createObject($apiQueryClass);
    }
}