<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 12.03.17
 * Time: 11:44
 */

namespace app\modules\main\components\filter;


use yii\base\Component;

abstract class PreviewFilter extends Component implements PreviewFilterInterface
{
    public $preview;
    public function setPreview($preview){
        $this->preview = $preview;
    }

    public function setParams($param)
    {

        $this->price = $param;

        // TODO: Implement setParams() method.
    }

    public function getResult()
    {
        return $this->useFilter();
        // TODO: Implement getResult() method.
    }

    abstract protected function useFilter();
}