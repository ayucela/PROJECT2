<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 23.03.17
 * Time: 14:38
 */

namespace app\components\hotels\queries\availability;


use yii\base\Object;

class Reviews extends Object implements AvailabilityOptionsInterface
{
    public $type;
    public $maxRate;
    public $minReviewCount;
}