<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 06.03.17
 * Time: 7:00
 */

namespace app\components\hotels\queries\availability;


use yii\base\Model;
use yii\base\Object;

class Hotels extends Object implements AvailabilityOptionsInterface
{
    public $hotel;
}