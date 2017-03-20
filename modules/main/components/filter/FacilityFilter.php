<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 12.03.17
 * Time: 11:49
 */

namespace app\modules\main\components\filter;


use app\components\hotels\helpers\FacilityHelper;
use app\modules\main\models\PreviewForm;

class FacilityFilter extends PreviewFilter implements PreviewFilterInterface
{
    public $facilities = [];
    public function setParams($param)
    {
        $this->facilities = $param;

        // TODO: Implement setParams() method.
    }

    protected function useFilter()
    {
        if($this->facilities){
            $facilities = $this->facilities['facility'];


            if($facilities) {
                $filterFacility = function ($elem) use ($facilities) {
                    foreach ($facilities as $item) {

                        $cache_key = 'facility'.$elem['code'];
                        if(\Yii::$app->cache->get($cache_key)){
                            $allFacilities = \Yii::$app->cache->get($cache_key);

                        } else {
                            $allFacilities = FacilityHelper::findFacilities($elem['code']);

                            \Yii::$app->cache->set($cache_key, $allFacilities);
                        }

                        foreach ($allFacilities as $allItem){

                            if($item == $allItem['description']){

                                return $elem;
                            }
                        }
                    }
                };

                return array_filter($this->preview, $filterFacility);
            }
            return false;
        }

    }

}