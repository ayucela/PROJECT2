<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 12.03.17
 * Time: 11:49
 */

namespace app\modules\main\components\filter;


use app\modules\main\models\PreviewForm;

class PriceFilter extends PreviewFilter implements PreviewFilterInterface
{
    public $price = [];

    public function setPreview($preview){
        $this->preview = $preview;
    }

    public function setParams($param)
    {

        $this->price = $param;

       // TODO: Implement setParams() method.
    }

    public function getResult()
    {
       return $this->useFilter();
        // TODO: Implement getResult() method.
    }

    protected function useFilter()
    {
        if($this->price){
            $price = $this->price['price'];

            $filterPrice = function($elem) use ($price) {
                $hotelPrice = explode(' ', $elem['price'])[0];

                if($hotelPrice <= $price['maxPrice'] && $hotelPrice >= $price['minPrice']){
                    return $elem;
                }
            };
            return array_filter($this->preview, $filterPrice);
        } else {
            return $this->preview;
        }

    }

}