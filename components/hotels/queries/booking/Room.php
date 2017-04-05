<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 26.03.17
 * Time: 10:40
 */

namespace app\components\hotels\queries\booking;




class Room implements BookingOptionsInterface
{
    public $rateKey;
    public $paxes = [];
}