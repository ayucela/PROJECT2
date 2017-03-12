<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 12.03.17
 * Time: 11:44
 */

namespace app\modules\main\components\filter;


use yii\base\Component;

abstract class PreviewFilter extends Component
{
    public $preview;
    abstract public function setParams($param);
    abstract public function getResult();
    abstract protected function useFilter();
}