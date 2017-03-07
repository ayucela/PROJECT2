<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 26.02.17
 * Time: 6:59
 */

namespace app\components\hotels;


use hotelbeds\hotel_api_sdk\HotelApiClient;
use hotelbeds\hotel_api_sdk\types\ApiVersion;
use hotelbeds\hotel_api_sdk\types\ApiVersions;
use yii\base\Component;

/**
 * Class HotelsApi - init Hotelbeds Hotel Client Api
 * @package app\components\hotels
 * @property string $url
 * @property string $apiKey
 * @property string $sharedSecret
 * @property ApiVersion $version
 * @property integer $timeout
 * @property Config $config
 */

class HotelsApi extends Component
{
    /**
     * @var
     */
    public $url;
    /**
     * @var
     */
    public $apiKey;
    /**
     * @var
     */
    public $sharedSecret;
    /**
     * @var
     */
    public $timeout;

    /**
     * @var
     */
    private $config;
    /**
     * @var
     */
    private $version;

    /**
     * init ApiClient
     */
    public function init()
    {
        $this->version = new ApiVersion(ApiVersions::V1_0);
        $this->config = \Yii::$app->hotels;
        $this->url = $this->url ? $this->url : $this->config->url;
        $this->apiKey = $this->apiKey ? $this->apiKey : $this->config->apiKey;
        $this->sharedSecret = $this->sharedSecret ? $this->sharedSecret : $this->config->sharedSecret;
        $this->timeout = $this->timeout ? $this->timeout : $this->config->timeout;

    }

    /**
     * @return HotelApiClient object
     */
    public function getClient()
    {
        return  new HotelApiClient($this->url, $this->apiKey, $this->sharedSecret, $this->version, $this->timeout);
    }
}