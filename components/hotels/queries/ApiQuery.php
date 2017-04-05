<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 04.03.17
 * Time: 0:50
 */

namespace app\components\hotels\queries;


use linslin\yii2\curl\Curl;
use yii\base\Model;

abstract class ApiQuery extends Model implements ApiQueryInterface
{
    const QUERY_PREFIX = '?';

    public $fields;
    public $language;
    public $from;
    public $to;

    private $apiKey;
    private $sharedSecret;
    protected $url;
    protected $curl;
    protected $requestUrl;
    protected $response;
    protected $availableFields = [];

    private $signature;

    public function init()
    {
        $config = \Yii::$app->hotels;
        $this->url = $config->url;
        $this->apiKey = $config->apiKey;
        $this->sharedSecret = $config->sharedSecret;
        $this->signature = $config->signature;

        $this->curl = new Curl();
        $this->curl->setHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Api-key' => $this->apiKey,
            'X-Signature' =>$this->signature,
        ]);

    }

    public function addParams(array $params = null)
    {

        if ($params && is_array($params)) {

            $this->setAttributes($params, false);

        }
        return $this;
    }

    public function addFields($fields = null)
    {
        if ($fields) {
            if(is_string($fields)) {
                $fields =  explode(',',(str_replace(' ', '', $fields)));
            }
            if (is_array($fields)) {
                $existFields = array_intersect($fields, $this->availableFields);
                $this->fields = implode(',', $existFields);
            }
        }
        return $this;
    }





    abstract public function get();
    abstract public function post();
    abstract public function response();
    abstract public function asArray();
}