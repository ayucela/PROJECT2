<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 22.03.17
 * Time: 10:05
 */

namespace app\components\hotels\helpers;


use yii\base\Component;

class FacilityCssClasses extends Component
{
    private $icons = [
        [
            'description' => 'Fireplace',
            'class' => 'soap-icon-fireplace'
        ],
        [
            'description' => 'Air conditioning in public areas',
            'class' => 'soap-icon-aircon'
        ],
        [
            'description' => 'Individually adjustable air conditioning',
            'class' => 'soap-icon-aircon'
        ],
        [
            'description' => 'Fridge',
            'class' => 'soap-icon-fridge'
        ],
        [
            'description' => 'Mini fridge',
            'class' => 'soap-icon-fridge'
        ],
        [
            'description' => 'TV',
            'class' => 'soap-icon-television'
        ],
        [
            'description' => 'Restaurant',
            'class' => 'soap-icon-food'
        ],
        [
            'description' => 'Bar',
            'class' => 'soap-icon-winebar'
        ],
        [
            'description' => 'Minibar',
            'class' => 'soap-icon-winebar'
        ],
        [
            'description' => 'Wi-fi',
            'class' => 'soap-icon-wifi'
        ],
        [
            'description' => 'Internet access',
            'class' => 'soap-icon-wifi'
        ],
        [
            'description' => 'Gym',
            'class' => 'soap-icon-fitnessfacility'
        ],
        [
            'description' => 'Radio',
            'class' => 'soap-icon-fmstereo'
        ],

    ];

    private $_currentIcon;

    public static function icons($description)
    {
        $icons = new self();
        $icon = $icons ->findIcon($description);
        if($icon){
            return $icon;
        } else
            return false;

    }

    public function findIcon($description)
    {

        foreach ($this->icons as $icon){
            if($icon['description']==$description){

                $this->_currentIcon['class'] = $icon['class'];
                $this->_currentIcon['description'] = $description;

            }
        }
        return $this->_currentIcon;

    }

    public function getIcon($icon)
    {
        if($icon) {

            return $icon;
        } else
            return false;
    }

}