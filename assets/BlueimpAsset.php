<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace app\assets;

use yii\web\AssetBundle;

class MagnificAsset extends AssetBundle
{
    public $sourcePath = '@bower/blueimp-bootstrap-image-gallery';
    public $js = [
        'dist/jquery.magnific-popup.min.js'
    ];
    public $css = [
        'dist/magnific-popup.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
