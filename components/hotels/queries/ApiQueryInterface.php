<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 05.03.17
 * Time: 22:18
 */

namespace app\components\hotels\queries;


interface ApiQueryInterface
{
    public function addParams();
    public function addFields();
    public function get();
    public function post();
    public function response();
    public function asArray();
}