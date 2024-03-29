<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 11.03.17
 * Time: 22:11
 */

namespace app\modules\main\components\widgets;


use app\components\hotels\helpers\FacilityHelper;
use yii\base\Widget;

class FacilityIcon extends Widget
{
    public $hotel_code;

    private $facility_icons = [];

    private $facilities = [];

    private $cache;

    private $cache_key;


    public function init()
    {
        $this->cache = \Yii::$app->cache;
        $this->cache_key = 'icon_'.$this->hotel_code;

        $this->facility_icons = [
            [
                'description' => 'Fireplace',
                'class' => 'soap-icon-fireplace circle'
            ],
            [
                'description' => 'Air conditioning in public areas',
                'class' => 'soap-icon-aircon circle'
            ],
            [
                'description' => 'Fridge',
                'class' => 'soap-icon-fridge circle'
            ],
            [
                'description' => 'TV',
                'class' => 'soap-icon-television circle'
            ],
            [
                'description' => 'Restaurant',
                'class' => 'soap-icon-food circle'
            ],
            [
                'description' => 'Bar',
                'class' => 'soap-icon-winebar circle'
            ],
            [
                'description' => 'Wi-fi',
                'class' => 'soap-icon-wifi circle'
            ],
            [
                'description' => 'Gym',
                'class' => 'soap-icon-fitnessfacility circle'
            ],
        ];

        $this->facilities = $this->cache->get($this->cache_key);
        if(!$this->facilities){
            $this->facilities = FacilityHelper::findFacilities($this->hotel_code);
            $this->cache->set($this->cache_key, $this->facilities);
        }
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {

        parent::run(); // TODO: Change the autogenerated stub


            $icons = $this->facilityIcons($this->facilities);

        return $this->render('facility-icon', compact('icons'));
    }

    private function facilityIcons($facilities)
    {

        foreach($facilities as $facility){
            foreach($this->facility_icons as $icon){
                if($icon['description'] == $facility['description']){
                    $icons[] = $icon;
                }
            }

        }
        return $icons;

    }

}