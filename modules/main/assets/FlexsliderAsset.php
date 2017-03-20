<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 30.05.16
 * Time: 22:27
 */

/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 29.03.16
 * Time: 23:11
 */
namespace app\modules\main\assets;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class FlexsliderAsset extends AssetBundle
{
    public $sourcePath = "@bower/flexslider";

    public $css = [
        'flexslider.css'
    ];

    public $js = [
        'jquery.flexslider-min.js'
    ];

    public  $depends = [
        'yii\web\YiiAsset'
    ];
}