<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 26.02.17
 * Time: 8:06
 */

namespace app\components\hotels;

/**
 * Class HotelsFilter
 * @package app\components\hotels
 */
use yii\base\Model;

class HotelsFilter extends Model implements FilterInterface
{
    /**
     * @var integer $maxHotels
     */
    public $maxHotels;
    /**
     * @var integer $maxRooms
     */
    public $maxRooms;
    /**
     * @var integer $maxRatesPerRoom
     */
    public $maxRatesPerRoom;
    /**
     * @var float $minRate
     */
    public $minRate;
    /**
     * @var float $maxRate
     */
    public $maxRate;
    /**
     * @var boolean $packaging
     */
    public $packaging;
    /**
     * @var string $paymentType
     */
    public $paymentType;
    /**
     * @var string $hotelPackage
     */
    public $hotelPackage;
    /**
     * @var integer $minCategory
     */
    public $minCategory;
    /**
     * @var integer $maxCategory
     */
    public $maxCategory;

}