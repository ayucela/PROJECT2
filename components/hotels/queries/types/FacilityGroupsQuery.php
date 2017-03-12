<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 11.03.17
 * Time: 9:26
 */

namespace app\components\hotels\queries\types;


use app\components\hotels\queries\ApiQuery;
use app\components\hotels\queries\ApiQueryInterface;

class FacilityGroupsQuery extends ApiQuery implements ApiQueryInterface
{
    const QUERY_URL = '/hotel-content-api/1.0/types/facilitygroups';
    public function init()
    {
        $this->fields =  'all';
        parent::init();
    }

    public function get()
    {
        $this->response=$this->curl->get($this->getQueryString());
        return $this;
    }

    public function post(){

    }

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