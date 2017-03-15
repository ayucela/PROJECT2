<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 13.03.17
 * Time: 8:11
 */

namespace app\modules\main\components\filter;


use yii\base\Object;
use yii\web\HttpException;

class FilterFactory extends Object
{

    public static $filters =[
        'price' => 'app\modules\main\components\filter\PriceFilter',
        'accs' => 'app\modules\main\components\filter\AccFilter',
        'facility' => 'app\modules\main\components\filter\FacilityFilter'
    ];

    public static function create($preview, array $params = null)
    {

        if($params) {
            foreach ($params as $key => $value) {
                if (array_key_exists($key, self::$filters)) {
                    $filter = new self::$filters[$key]();
                };
            }
            $filter->preview = $preview;
            if ($filter) {
                $filter->params = $params;
                return $filter->result;
            } else {
                throw new HttpException (503, 'Wrong filter params!');
            }
        } else
            throw new HttpException(503, 'Filter Params Not Set!');

    }

}