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
            <a href="/main/hotels/slideshow-ajax?hotelCode=<?=$model['code']?>" class="hover-effect popup-gallery"><img  alt="" src="<?=$model['view']?>"></a>
        </figure>
        <div class="details">
                                                <span class="price">
                                                    <small>avg/night</small>
                                                    <?=$model['price']?>
                                                 </span>

            <div class = "box-title-container">
            <h4 class="box-title"><?=$model['name']?><small><?=$model['city'].', '.$model['country']?></small></h4>
            </div>
            <div class="feedback">
                <div class="five-stars-container no-back-star">
                    <span class="star-<?=$model['category']?>" style="width: 80%;" data-toggle="tooltip" data-placement="bottom"
                          data-original-title="<?=$model['category']?>-star hotel"></span>
                </div>
                <span class="review">270 reviews</span>
            </div>
            <p class="description"><?= \yii\helpers\StringHelper::truncate($model['description'], 300)?></p>
            <div class="action">
                <?=\yii\helpers\Html::a('SELECT', ['/hotels/view', 'code'=>$model['code']],['class'=>'button btn-small'])?>
                <a class="button btn-small yellow popup-map" href="#" data-box="<?=$model['latitude']?>, <?=$model['longitude']?>">VIEW ON MAP</a>
            </div>
        </div>
    </article>
</div>


