<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 26.03.17
 * Time: 10:29
 */

namespace app\components\hotels\queries\booking;



class Pax implements BookingOptionsInterface
{
    public $type;
    public $name;
    public $surname;
    public $age;
    public $roomId;
}