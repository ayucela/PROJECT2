<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 25.02.17
 * Time: 21:16
 */

namespace app\models\api;


use app\components\hotels\Availability;
use app\components\hotels\HotelsFilter;
use app\components\hotels\HotelsSearch;
use yii\base\Model;
/**
 * Hotelbeds Api Data Model
 *
 * @property string $destination
 * @property string $date_from
 * @property string $date_to
 * @property integer $rooms
 * @property integer $adults
 * @property integer $kids *
 *
 */

class HotelsApi extends Model
{
    /**
     * @var HotelsSearch $search
     */
    public $search;


    /**
     * Calls Hotelbeds Api
     * @return mixed
     */
    public function call()
    {
        $availability = new Availability(new \app\components\hotels\HotelsApi());
        $availability->search = $this->search;

        return $availability->hotels;
    }

}