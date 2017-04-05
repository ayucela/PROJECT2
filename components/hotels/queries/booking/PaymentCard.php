<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 26.03.17
 * Time: 12:46
 */

namespace app\components\hotels\queries\booking;




class PaymentCard implements BookingOptionsInterface
{
    public $cardType;
    public $cardNumber;
    public $expirityDate;
    public $cardCVC;
}