<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 04.03.17
 * Time: 1:00
 */

namespace app\components\hotels;


use yii\base\Component;

class ConfigApi extends Component
{
    public $url;
    public $apiKey;
    public $sharedSecret;
    private $signature;

    public function init()
    {

        $this->signature =  hash("sha256", $this->apiKey.$this->sharedSecret.time());
    }

    public function getSignature()
    {
        return $this->signature;
    }

}