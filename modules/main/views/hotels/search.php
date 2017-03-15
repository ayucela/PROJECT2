<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 06.03.17
 * Time: 23:26
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container">
    <div id="main" data-view = <?=$viewType['name']?>>
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <?php $form = ActiveForm::begin([
                    'id' => 'preview-form',
                    'enableClientValidation' => true,
                    'fieldConfig' => [
                        'options' => [
                            'tag' => false,
                        ],
                    ],
                ])?>
                <h4 class="search-results-title" ><i class="soap-icon-search"></i><b><?=count($model->preview)?></b> results found.</h4>
                <div class="toggle-container filters-container" id="price-container">
                    <div class="panel style1 arrow-right">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#price-filter" class="collapsed">Price</a>
                        </h4>
                        <div id="price-filter" class="panel-collapse collapse">
                            <div class="panel-content">
                                <div id="price-range"></div>
                                <br />
                                <span class="min-price-label pull-left" id="min-price"><?= $model->minmax['min']-50?></span>
                                <span class="max-price-label pull-right" id="max-price"><?= $model->minmax['max']+100?></span>
                                <div class="clearer"></div>
                            </div><!-- end content -->
                        </div>
                        <input type="hidden" name="PreviewForm[price_from]" value="<?= $model->price_from?>"  id="previewform-price_from" />
                        <input type="hidden" name="PreviewForm[price_to]"  value="<?= $model->price_to?>" id="previewform-price_to" />
                    </div>

                    <div class="panel style1 arrow-right">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#accomodation-type-filter" class="collapsed">Accomodation Type</a>
                        </h4>

                        <div id="accomodation-type-filter" class="panel-collapse collapse">
                            <?= \app\modules\main\components\widgets\Accommodations::widget([
                                'accs'=> $model->accommodation
                            ])?>
                        </div>
                        <input type="hidden" name="PreviewForm[accommodation]" value="<?= $model->accommodation?>"  id="previewform-accommodation"/>
                    </div>

                    <div class="panel style1 arrow-right">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#amenities-filter" class="collapsed">Amenities</a>
                        </h4>
                        <div id="amenities-filter" class="panel-collapse collapse">
                            <?= \app\modules\main\components\widgets\Facilities::widget([
                                'facility'=> $model->amenities
                            ])?>
                        </div>
                        <input type="hidden" name="PreviewForm[amenities]" value="<?=$model->amenities?>"  id="previewform-amenities" />
                    </div>


                    <div class="panel style1 arrow-right">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#modify-search-panel" class="collapsed">Modify Search</a>
                        </h4>
                        <div id="modify-search-panel" class="panel-collapse collapse">
                            <div class="panel-content">

                                    <div class="form-group">
                                        <label>destination</label>
                                        <input type="text" name="PreviewForm[destination]"  id="previewform-destination" class="input-text full-width" value="<?=$model->destination?>" placeholder="enter a destination or hotel name"
                                               aria-required="true" aria-invalid="true"/>
                                        <div class="help-block"><?= $searchForm->errors['destination'] ? $searchForm->errors['destination'][0] : ''?></div>
                                    </div>
                                    <div class="form-group">
                                        <label>check in</label>
                                        <div class="datepicker-wrap">
                                            <input type="text" name="PreviewForm[date_from]"  id="previewform-date_from" value="<?=$model->date_from?>" class="input-text full-width" placeholder="mm/dd/yy" />
                                            <div class="help-block"><?= $searchForm->errors['date_from'] ? $searchForm->errors['date_from'][0] : ''?></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>check out</label>
                                        <div class="datepicker-wrap">
                                            <input type="text" name="PreviewForm[date_to]"  id="previewform-date_to" value="<?=$model->date_to?>" class="input-text full-width" placeholder="mm/dd/yy" />
                                            <div class="help-block"><?= $searchForm->errors['date_to'] ? $searchForm->errors['date_to'][0] : ''?></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>rooms</label>
                                        <div class="selector">
                                            <select id="previewform-rooms" name="PreviewForm[rooms]" class="full-width">
                                                <option selected value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>adults</label>
                                        <div class="selector">
                                            <select id="previewform-adults" name="PreviewForm[adults]" class="full-width">
                                                <option selected value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>child</label>
                                        <div class="selector">
                                            <select id="previewform-children" name="PreviewForm[children]" class="full-width">
                                                <option selected value="0">No kids</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br />

                                    <button type="submit" class="btn-medium icon-check uppercase full-width" id="preview-button-submit">search again</button>

                            </div>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end()?>
            </div>
            <div class="col-sm-8 col-md-9">
                <div class="sort-by-section clearfix">
                    <h4 class="sort-by-title block-sm">Sort results by:</h4>
                    <ul class="sort-bar clearfix block-sm">
                        <li class="sort-by-name"><a class="sort-by-container" href="#"><span>name</span></a></li>
                        <li class="sort-by-price"><a class="sort-by-container" href="#"><span>price</span></a></li>
                        <li class="clearer visible-sms"></li>
                        <li class="sort-by-rating active"><a class="sort-by-container" href="#"><span>rating</span></a></li>
                        <li class="sort-by-popularity"><a class="sort-by-container" href="#"><span>popularity</span></a></li>
                    </ul>

                    <ul class="swap-tiles clearfix block-sm">
                        <li class="swap-list <?= $viewType['name'] == '_search-list' ? 'active' : ''?>">
                            <?=Html::a('<i class="soap-icon-list"></i>',['/hotels/search', 'view'=>'_search-list'])?>
                        </li>
                        <li class="swap-grid <?= $viewType['name'] == '_search-grid' ? 'active' : ''?>">
                            <?=Html::a('<i class="soap-icon-grid"></i>',['/hotels/search', 'view'=>'_search-grid'])?>
                        </li>
                        <li class="swap-block <?= $viewType['name'] == '_search-block' ? 'active' : ''?>">
                            <?=Html::a('<i class="soap-icon-block"></i>',['/hotels/search', 'view'=>'_search-block'])?>
                        </li>
                    </ul>
                </div>

                <?php \yii\widgets\Pjax::begin(['id'=>'view-content'])?>

                <?= \app\modules\main\components\widgets\SearchView::widget([
                    'preview' => $model->preview,
                    'viewType' => $viewType['name'],
                    'pageSize' => $viewType['perPage']
                ])?>

                <?php \yii\widgets\Pjax::end()?>


                <a href="#" class="uppercase full-width button btn-large">load more listing</a>
            </div>
        </div>
    </div>
</div>
