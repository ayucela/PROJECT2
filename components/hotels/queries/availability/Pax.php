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

class Pax extends Object implements AvailabilityOptionsInterface
{
    public $checkIn;
    public $checkOut;
    public $shiftDays;
    public $allowOnlyShift;

}