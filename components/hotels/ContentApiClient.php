<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 03.03.17
 * Time: 23:03
 */

namespace app\components\hotels;


use app\components\hotels\queries\HotelsApiQuery;
use linslin\yii2\curl\Curl;
use yii\base\Component;

/**
 * Class ClientApi
 * @package app\components\hotels
 * Hotelbeds Api
 * @property
 */

class ContentApiClient extends ApiClient
{
    public function get()
    {
        $query = $this->createQuery();

        return json_decode($this->curl->get($query));
    }

    public function post()
    {
        // TODO: Implement responsePost() method.
    }


}