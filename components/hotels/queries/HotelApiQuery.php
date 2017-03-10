<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 04.03.17
 * Time: 0:50
 */

namespace app\components\hotels\queries;



class HotelApiQuery extends ApiQuery implements ApiQueryInterface
{
   const QUERY_URL = '/hotel-content-api/1.0/hotels/';


    private $hotel_code;

    public $language;
    public $useSecondaryLanguage;



    public function rules()
    {
        return [

            [['language', 'useSecondaryLanguage'], 'string'],
            ['hotel_code', 'integer']
        ];
    }

    public function setHotel($hotel_code)
    {
        if($hotel_code && is_integer($hotel_code)){

            $this->hotel_code = $hotel_code;
        }
        return $this;
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
        $this->response = $this->response['hotel'];
        return $this->response;
        // TODO: Implement asArray() method.
    }

    public function response()
    {
        if(!is_array($this->response)){
            $this->response = json_decode($this->response);
            $this->response = $this->response->hotel;
        }
        // TODO: Implement response() method.
        return $this->response;
    }

    protected function getQueryString()
    {
        return $this->url.self::QUERY_URL.$this->hotel_code.parent::QUERY_PREFIX.http_build_query($this->attributes);
    }


}