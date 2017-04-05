<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 26.03.17
 * Time: 7:08
 */

namespace app\components\hotels\queries\types;


use app\components\hotels\queries\ApiQuery;
use app\components\hotels\queries\ApiQueryInterface;
use app\components\hotels\queries\booking\ContactData;
use app\components\hotels\queries\booking\Holder;
use app\components\hotels\queries\booking\PaymentData;
use app\components\hotels\queries\booking\Room;

class BookingApiQuery extends ApiQuery implements ApiQueryInterface
{
    const QUERY_PREFIX = '?';
    const QUERY_URL = '/hotel-api/1.0/bookings';

    public $holder;
    public $rooms = [];
    public $paxes = [];
    public $paymentData=[];
    public $language;
    public $clientReference;
    public $remark;
    public $contactData;


    private $body = [];

    public function addHolder(Holder $holder)
    {
        $this->holder = $holder;
        return $this;
    }

    public function addPaymentData(PaymentData $paymentData)
    {

        $this->paymentData[] = $paymentData;

        return $this;
    }

    public function addRoom(Room $rooms)
    {
        $this->rooms[] = $rooms;
        return $this;
    }
    public function addContactData(ContactData $contact)
    {
        $this->contactData = $contact;
        return $this;
    }





    public function post()
    {

        $this->response = $this->curl->setRequestBody(json_encode($this->body()))
            ->post($this->getQueryString());

        return $this;
    }

    public function addClientReference($clientReference)
    {
        $this->clientReference = $clientReference;
        return $this;
    }


    public function get()
    {

    }

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

    private function body()
    {

        foreach ($this->attributes as $key => $item){
            if($item){

                $this->body[$key] = $item;
            }
        }


        return $this->body;
    }

    protected function getQueryString()
    {
        return $this->url.self::QUERY_URL;
    }

}