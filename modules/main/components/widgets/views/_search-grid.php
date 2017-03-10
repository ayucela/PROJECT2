<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 10.03.17
 * Time: 5:49
 */
?>

<div class="col-sm-6 col-md-4">
    <article class="box">
        <figure>
            <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="<?=$model['view']?>"></a>
        </figure>
        <div class="details">
                                                <span class="price">
                                                    <small>avg/night</small>
                                                    $620
                                                 </span>

            <div class = "box-title-container">
            <h4 class="box-title"><?=$model['name']?><small><?=$model['city'].', '.$model['country']?></small></h4>
            </div>
            <div class="feedback">
                <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                <span class="review">270 reviews</span>
            </div>
            <p class="description"><?= \yii\helpers\StringHelper::truncate($model['description'], 300)?></p>
            <div class="action">
                <a class="button btn-small" href="hotel-detailed.html">SELECT</a>
                <a class="button btn-small yellow popup-map" href="#" data-box="<<?=$model['latitude']?>, <?=$model['longitude']?>">VIEW ON MAP</a>
            </div>
        </div>
    </article>
</div>

<?php $this->registerJsFile('js/gmap3.js', ['depends' => \yii\web\YiiAsset::className()])?>
