<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 10.03.17
 * Time: 6:24
 */
?>
<div class="col-sms-6 col-sm-6 col-md-4">
    <article class="box">
        <figure>
            <a href="ajax/slideshow-popup.html" title="" class="hover-effect popup-gallery"><img src="<?= $model['view']?>" alt="" width="270" height="160" /></a>
        </figure>
        <div class="details">
            <a title="View all" href="hotel-detailed.html" class="pull-right button uppercase">select</a>
            <h4 class="box-title"><?= \yii\helpers\StringHelper::truncateWords($model['description'], 20)?></h4>
            <label class="price-wrapper">
                <span class="price-per-unit">$620</span>avg/night
            </label>
        </div>
    </article>
</div>
