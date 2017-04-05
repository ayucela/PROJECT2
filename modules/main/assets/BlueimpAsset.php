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

class BlueimpAsset extends AssetBundle
{

    public $sourcePath = '@webroot/components/Gallery-master';
    public $css = [
        'css/blueimp-gallery.min.css'
    ];
    public $js = [
        'js/jquery.blueimp-gallery.min.js',
    ];
}