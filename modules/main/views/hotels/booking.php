<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 24.03.17
 * Time: 6:23
 */

use yii\widgets\ActiveForm;
?>
<div class="page-title-container">
    <div class="container">
        <div class="page-title pull-left">
            <h2 class="entry-title">Hotel Booking</h2>
        </div>
        <ul class="breadcrumbs pull-right">
            <li><a href="#">HOME</a></li>
            <li class="active">Hotel Booking</li>
        </ul>
    </div>
</div>
<section id="content" class="gray-area">
    <div class="container">
        <div class="row">
            <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                <div class="booking-section travelo-box">
                <?php $form = ActiveForm::begin([
                    'id' => 'booking-form',
                ])?>
                        <div class="alert small-box" style="display: none;"></div>
                        <div class="person-information">
                            <h2>Your Personal Information</h2>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <label>first name</label>
                                    <?= $form->field($model, 'firstname')->textInput(['class'=>'input-text full-width'])->label(false) ?>

                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label>last name</label>
                                    <?= $form->field($model, 'lastname')->textInput(['class'=>'input-text full-width'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <label>email address</label>
                                    <?= $form->field($model, 'email')->textInput(['class'=>'input-text full-width'])->label(false) ?>
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label>Verify E-mail Address</label>
                                    <?= $form->field($model, 'emailConfirm')->textInput(['class'=>'input-text full-width'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <label>Country code</label>
                                    <div class="selector">
                                        <?= $form->field($model, 'countryCode')->dropDownList([
                                            '44' => 'United Kingdom (+44)',
                                            '1' => 'United States (+1)'
                                        ],['class'=>'input-text full-width'])->label(false) ?>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label>Phone number</label>
                                    <?= $form->field($model, 'phoneNumber')->textInput(['class'=>'input-text full-width'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <?= $form->field($model, 'promoOffer')->checkbox()->label(false) ?>
                                         I want to receive <span class="skin-color">Travelo</span> promotional offers in the future
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="card-information">
                        <?php if($paymentType == 'IN_HOTEL') : ?>
                            <h2>Your Card Information</h2>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <label>Credit Card Type</label>
                                    <div class="selector">
                                        <?= $form->field($model, 'creditCardType')->dropDownList([
                                            'VI' => 'VISA',
                                            'AE' => 'American Express',
                                            'ME' => 'Maestro'
                                        ],['class'=>'input-text full-width'])->label(false) ?>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label>Card holder name</label>
                                    <?= $form->field($model, 'cardHolderName')->textInput(['class'=>'input-text full-width'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <label>Card number</label>
                                    <?= $form->field($model, 'cardNumber')->textInput(['class'=>'input-text full-width'])->label(false) ?>
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label>Card identification number</label>
                                    <?= $form->field($model, 'cardIdentificationNumber')->textInput(['class'=>'input-text full-width'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <label>Expiration Date</label>
                                    <div class="constant-column-2">
                                        <div class="selector">
                                            <?= $form->field($model, 'expirationDateMonth')->dropDownList([
                                                'Jan'=>'January',
                                                'Feb'=>'February',
                                                'Mar'=>'March',
                                                'Apr'=>'April',
                                                'May'=>'May',
                                                'Jun'=>'June',
                                                'Jul'=>'July',
                                                'Aug'=>'August',
                                                'Sep'=>'September',
                                                'Oct'=>'October',
                                                'Nov'=>'November',
                                                'Dec'=>'December',
                                            ],['class'=>'input-text full-width'])->label(false) ?>
                                        </div>
                                        <div class="selector">
                                            <?= $form->field($model, 'expirationDateYear')->dropDownList([
                                                '2017'=>'2017',
                                                '2018'=>'2018',
                                                '2019'=>'2019',
                                                '2020'=>'2020',
                                             ],['class'=>'input-text full-width'])->label(false) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-2">
                                    <label>billing zip code</label>
                                    <?= $form->field($model, 'billingZipCode')->textInput(['class'=>'input-text full-width'])->label(false) ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        </div>
                        <hr />
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <?= $form->field($model, 'term')->checkbox()->label(false) ?> By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>.
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 col-md-5">
                                <button type="submit" class="full-width btn-large">CONFIRM BOOKING</button>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                <div class="booking-details travelo-box">
                    <h4>Booking Details</h4>
                    <article class="image-box hotel listing-style1">
                        <figure class="clearfix">
                             <div class="travel-title">
                                <h5 class="box-title"><?= $hotel->name->content ?><small><?= $hotel->destination->name->content ?>&nbsp;<?= $hotel->country->description->content ?></small></h5>
                                <?= \yii\helpers\Html::a('EDIT', ['/hotels/view', 'code'=> $hotel->code], ['class'=>'button']) ?>
                             </div>
                        </figure>
                        <div class="details">main
                            <div class="feedback">
                                <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container no-back-star" title="<?= $hotel->category->code[0] ?> stars"><span style="width: 80%;" class="star-<?= $hotel->category->code[0] ?>"></span></div>
                                <!--<span class="review">270 reviews</span>-->
                            </div>
                            <div class="constant-column-3 timing clearfix">
                                <div class="check-in">
                                    <label>Check in</label>
                                    <span><?= Yii::$app->formatter->asDate($date_from, 'php: M d, Y')?></span>
                                </div>
                                <div class="duration text-center">
                                    <i class="soap-icon-clock"></i>
                                    <span><?= $nights?> Nights</span>
                                </div>
                                <div class="check-out">
                                    <label>Check out</label>
                                    <span><?= Yii::$app->formatter->asDate($date_to, 'php: M d, Y')?></span>
                                </div>
                            </div>
                            <div class="guest">
                                <small class="uppercase"><?= $rooms?> Standard family room for <span class="skin-color"><?= $adults + $children ?> Persons</span></small>
                            </div>
                        </div>
                    </article>

                    <h4>Other Details</h4>
                    <dl class="other-details">
                        <dt class="feature">room Type:</dt><dd class="value"><?= $name?></dd>
                        <dt class="feature">per Room price:</dt><dd class="value"><?= $price?></dd>
                        <dt class="feature"><?= $nights?> night Stay:</dt><dd class="value"><?= $price * $nights?></dd>
                        <!--<dt class="feature">taxes and fees:</dt><dd class="value">$10</dd>-->
                        <dt class="total-price">Total Price</dt><dd class="total-price-value"><?=$price*$rooms*$nights?></dd>
                    </dl>
                </div>

                <div class="travelo-box contact-box">
                    <h4>Need Travelo Help?</h4>
                    <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                    <address class="contact-details">
                        <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                        <br>
                        <a class="contact-email" href="#">help@travelo.com</a>
                    </address>
                </div>
            </div>
        </div>
    </div>
</section>