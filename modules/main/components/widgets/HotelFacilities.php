<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 22.03.17
 * Time: 12:21
 */

namespace app\modules\main\components\widgets;


use app\components\hotels\helpers\FacilityCssClasses;
use app\components\hotels\helpers\FacilityHelper;
use app\modules\main\components\filter\FacilityFilter;
use yii\base\Widget;

class HotelFacilities extends Widget
{
    public $hotelCode;
    private $_facilities;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->_facilities = FacilityHelper::findFacilities($this->hotelCode);
    }

    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub
        return $this->render('hotel-facilities', [
            'icons' => $this->getClasses()
        ]);
    }

    private function getClasses()
    {
        //dd($this->facilities);
        foreach ($this->_facilities as $facility){


            $icon = FacilityCssClasses::icons($facility['description']);
            if($icon){
                $icons[] = $icon;
            }
        }

        if(isset($icons)) {

            return $icons;
        } else
            return false;

    }
}