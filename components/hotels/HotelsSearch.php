<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 26.02.17
 * Time: 8:06
 */

namespace app\components\hotels;



use hotelbeds\hotel_api_sdk\model\Filter;
use yii\base\Model;

/**
 * Class HotelsSearch
 * @package app\components\hotels
 */

class HotelsSearch extends Model implements SearchInterface
{
    /**
     * @var array $hotels
     */
    public $hotels = [];
    /**
     * @var string $dateFrom
     */
    public $date_from;
    /**
     * @var string $dateTo
     */
    public $date_to;
    /**
     * @var string $rooms
     */
    public $rooms;
    /**
     * @var string $adults
     */
    public $adults;
    /**
     * @var string $kids
     */
    public $kids;
    /**
     * @var Filter $filter
     */
    public $filter;

}