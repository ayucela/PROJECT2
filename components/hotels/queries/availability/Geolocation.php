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

class Geolocation extends Object implements AvailabilityOptionsInterface
{
    public $longitude;
    public $latitude;
    public $radius;
    public $unit;
    public $secondaryLongitude;
    public $secondaryLatitude;


}