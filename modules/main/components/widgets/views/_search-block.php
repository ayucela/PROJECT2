<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 10.03.17
 * Time: 6:24
 */
?>
<div class="col-sms-6 col-sm-6 col-md-4">
    <article class="box small-box">
        <figure>
            <a href="/main/hotels/slideshow-ajax?hotelCode=<?=$model['code']?>" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="<?=$model['view']?>"></a>
        </figure>
        <div class="details">
            <?=\yii\helpers\Html::a('SELECT', ['/hotels/view', 'code'=>$model['code']],['class'=>'button btn-small full-width text-center'])?>
            <h4 class="box-title text-center"><?= \yii\helpers\StringHelper::truncateWords($model['name'], 20)?></h4>
            <label class="price-wrapper">
                <span class="price-per-unit text-center"><?= $model['price'] . ' ' . $model['currency'] ?></span>avg/night
            </label>
        </div>
    </article>
</div>
