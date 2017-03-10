<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 10.03.17
 * Time: 5:46
 */
?>
<?php if($viewType == '_search-list') : ?>
    <div class="hotel-list listing-style3 hotel"
<?php endif; ?>
<?php if($viewType == '_search-grid') : ?>
    <div class="hotel-list">
        <div class="row image-box hotel listing-style1">
<?php endif; ?>
<?php if($viewType == '_search-block') : ?>
    <div class="hotel-list">
        <div class="row image-box listing-style2">
<?php endif; ?>

    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'itemView' => $viewType,
    ]);?>
    </div>
<?php if($viewType == '_search-grid' || $viewType == '_search-block' )  : ?>
    </div>
<?php endif; ?>
