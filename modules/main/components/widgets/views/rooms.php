<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 19.03.17
 * Time: 14:14
 */

use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin([
    'id' => 'rooms-form',
    'enableClientValidation' => true,
    'fieldConfig' => [
        'options' => [
            'tag' => false,
        ],
    ],
])?>

<div class="update-search clearfix">
    <div class="col-md-5">
        <h4 class="title">When</h4>
        <div class="row">
            <div class="col-xs-6">
                <label>CHECK IN</label>
                <div class="datepicker-wrap">
                    <input type="text" name="RoomsForm[date_from]"  id="roomsform-date_from" value="<?=$model->date_from?>" class="input-text full-width" placeholder="mm/dd/yy" />
                    <div class="help-block"><?= $model->errors['date_from'] ? $model->errors['date_from'][0] : ''?></div>
                </div>
            </div>
            <div class="col-xs-6">
                <label>CHECK OUT</label>
                <div class="datepicker-wrap">
                    <input type="text" name="RoomsForm[date_to]"  id="roomsform-date_to" value="<?=$model->date_to?>" class="input-text full-width" placeholder="mm/dd/yy" />
                    <div class="help-block"><?= $model->errors['date_to'] ? $model->errors['date_to'][0] : ''?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <h4 class="title">Who</h4>
        <div class="row">
            <div class="col-xs-4">
                <label>ROOMS</label>
                <div class="selector">
                    <select id="roomsform-rooms" name="RoomsForm[rooms]" class="full-width">
                        <option selected value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4">
                <label>ADULTS</label>
                <div class="selector">
                    <select id="roomsform-adults" name="RoomsForm[adults]" class="full-width">
                        <option selected value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4">
                <label>KIDS</label>
                <div class="selector">
                    <div class="selector">
                        <select id="roomsform-children" name="RoomsForm[children]" class="full-width">
                            <option selected value="0">No kids</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <h4 class="visible-md visible-lg">&nbsp;</h4>
        <label class="visible-md visible-lg">&nbsp;</label>
        <div class="row">
            <div class="col-xs-12">
                <button type= "submit" data-animation-duration="1" data-animation-type="bounce" class="full-width icon-check animated" type="submit">SEARCH NOW</button>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end()?>
<h2>Available Rooms</h2>
<div class="room-list listing-style3 hotel">

    <?php foreach($model->availableRooms as $room) : ?>

    <article class="box">
        <figure class="col-sm-4 col-md-3">
            <a class="hover-effect popup-gallery" href="ajax/slideshow-popup.html" title=""><img width="230" height="160" src="<?=\app\components\hotels\hotel\Room::IMAGE_URL.$room->images[0]->path?>" alt=""></a>
        </figure>
        <div class="details col-xs-12 col-sm-8 col-md-9">
            <div>
                <div>
                    <div>
                        <div class="box-title">
                            <h4 class="title"><?=$room->name?></h4>
                            <dl class="description">
                                <dt>Rooms:</dt>
                                <dd><?=$room->rooms?>&nbsp;rooms</dd>
                                <dt>Adults:</dt>
                                <dd><?=$room->adults?>&nbsp;persons</dd>
                                <?php if($room->children) : ?>
                                    <dt>Children:</dt>
                                    <dd><?=$room->children?>&nbsp;children</dd>
                                <?php endif;?>
                            </dl>
                        </div>
                        <div class="amenities">
                            <i class="soap-icon-wifi circle"></i>
                            <i class="soap-icon-fitnessfacility circle"></i>
                            <i class="soap-icon-fork circle"></i>
                            <i class="soap-icon-television circle"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div>

                <div class="action-section">
                    <div style = "display: inline-block">
                    <span class="board">BB</span>
                    <span class="price"><small>PER/NIGHT</small>$121</span>
                    <a href="hotel-booking.html" title="" class="button btn-small full-width text-center">BOOK NOW</a>
                        </div>
                    <div style = "display: inline-block">
                        <span class="price"><small>PER/NIGHT</small>$121</span>
                        <a href="hotel-booking.html" title="" class="button btn-small full-width text-center">BOOK NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <?php endforeach; ?>

    <a href="#" class="load-more button full-width btn-large fourty-space">LOAD MORE ROOMS</a>
</div>
