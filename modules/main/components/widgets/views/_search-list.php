<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 07.03.17
 * Time: 18:13
 */
?>


<article class="box">



   <div class="col-sm-5 col-md-4 " >
        <div class="gallery">
            <figure>
                <a href="/main/hotels/slideshow-ajax?hotelCode=<?=$model['code']?>" class="hover-effect popup-gallery"><img alt="" src="<?=$model['view']?>"></a>
            </figure>
        </div>

    </div>
    <div class="details col-sm-7 col-md-8">
        <div>
            <div>
                <h4 class="box-title"><?=$model['name']?><small><i class="soap-icon-departure yellow-color"></i> <?=$model['country']?>,<?=' '.$model['city']?></small></h4>
                <div class="five-stars-container no-back-star">
                    <span class="star-<?=$model['category']?>" style="width: 80%;" data-toggle="tooltip" data-placement="bottom"
                          data-original-title="<?=$model['category']?>-star hotel"></span>
                </div>
                <?=\app\modules\main\components\widgets\FacilityIcon::widget([
                    'hotel_code' => $model['code']
                ])?>
            </div>
            <div>
                <div class="five-stars-container">
                    <span class="five-stars" style="width: 80%;"></span>
                </div>
                <span class="review">270 reviews</span>
            </div>
        </div>
        <div>
            <p><?= \yii\helpers\StringHelper::truncateWords($model['description'], 30)?></p>
            <div>
                <span class="price"><small>AVG/NIGHT</small><?=$model['price']?></span>
                <?=\yii\helpers\Html::a('SELECT', ['/hotels/view', 'code'=>$model['code']],['class'=>'button btn-small full-width text-center'])?>
            </div>
        </div>
    </div>
</article>


