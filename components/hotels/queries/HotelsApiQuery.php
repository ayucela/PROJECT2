<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 04.03.17
 * Time: 0:50
 */

namespace app\components\hotels\queries;


use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;

class HotelsApiQuery extends ApiQuery implements ApiQueryInterface
{
    const QUERY_PREFIX = '?';
    const QUERY_URL = '/hotel-content-api/1.0/hotels';

    public $codes=[];
    public $fields;
    public $destinationCode;
    public $countryCode;
    public $lastUpdateTime;
    public $language;
    public $from;
    public $to;
    public $useSecondaryLanguage;

    protected $availableFields = [
          'name', 'description', 'countryCode', 'destinationCode', 'zoneCode', 'coordinates',
          'categoryCode', 'chainCode', 'licence', 'address', 'postalCode', 'city', 'email',
          'giataCode', 'accomodationTypeCode', 'phones', 'rooms', 'images', 'boardCodes',
          'facilities', 'segmentCode', 'web', 'terminals', 'issues', 'interestPoints','wildcards',
           'all'
    ];


    public function init()
    {
        $this->fields =  'all';
        parent::init();
    }

    public function rules()
    {
        return [

            [['destinationCode', 'countryCode', 'lastUpdateTime', 'language', 'from', 'to', 'useSecondaryLanguage', 'fields' ], 'string']
        ];
    }

    public function get()
    {
        $this->response=$this->curl->get($this->getQueryString());
        return $this;
    }

    public function post(){}

    public function asArray()
    {
        $this->response = json_decode($this->response, $assoc = true);
        return $this;
        // TODO: Implement asArray() method.
    }

    public function response()
    {
        if(!is_array($this->response)){
            $this->response = json_decode($this->response);
        }
        // TODO: Implement response() method.
        return $this->response;
    }

    protected function getQueryString()
    {
        return $this->url.self::QUERY_URL.parent::QUERY_PREFIX.http_build_query($this->attributes);
    }
}