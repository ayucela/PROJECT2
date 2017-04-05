<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 26.03.17
 * Time: 10:31
 */

namespace app\components\hotels\queries\booking;



class PaymentData implements BookingOptionsInterface
{
    public $cardHolderName;
    public $paymentCard;
    public $contactData;

}