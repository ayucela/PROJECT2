<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 04.03.17
 * Time: 17:47
 */

namespace app\components\hotels\queries;


class QueryFactory
{

    public static $queryType = [
        'hotels' => 'app\components\hotels\queries\HotelsApiQuery',
        'hotel' =>'app\components\hotels\queries\HotelApiQuery',
    ];

    public static function create($type)
    {
        if(array_key_exists($type, self::$queryType)){
            return new self::$queryType[$type];
        }
        return false;
    }


}