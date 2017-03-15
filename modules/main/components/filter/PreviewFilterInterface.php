<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 15.03.17
 * Time: 6:22
 */

namespace app\modules\main\components\filter;


interface PreviewFilterInterface
{
    public function setPreview($preview);

    public function setParams($param);

    public function getResult();


}