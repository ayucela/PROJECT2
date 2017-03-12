<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 06.03.17
 * Time: 23:26
 */
use yii\helpers\Html;
?>

<div class="container">
    <div id="main">
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <h4 class="search-results-title"><i class="soap-icon-search"></i><b><?=count($preview)?></b> results found.</h4>
                <div class="toggle-container filters-container">
                    <div class="panel style1 arrow-right">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#price-filter" class="collapsed">Price</a>
                        </h4>
                        <div id="price-filter" class="panel-collapse collapse">
                            <div class="panel-content">
                                <div id="price-range"></div>
                                <br />
                                <span class="min-price-label pull-left" id="min-price" data-filter = <?= $filteredMinMax['min']?>><?=$minMax['min']?></span>
                                <span class="max-price-label pull-right" id="max-price" data-filter = <?= $filteredMinMax['max']?>><?=$minMax['max']?></span>
                                <div class="clearer"></div>
                            </div><!-- end content -->
                        </div>
                    </div>

                    <div class="panel style1 arrow-right">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#rating-filter" class="collapsed">User Rating</a>
                        </h4>
                        <div id="rating-filter" class="panel-collapse collapse filters-container">
                            <div class="panel-content">
                                <div id="rating" class="five-stars-container editable-rating"></div>
                                <br />
                                <small>2458 REVIEWS</small>
                            </div>
                        </div>
                    </div>

                    <div class="panel style1 arrow-right">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#accomodation-type-filter" class="collapsed">Accomodation Type</a>
                        </h4>
                        <div id="accomodation-type-filter" class="panel-collapse collapse">
                            <div class="panel-content">
                                <ul class="check-square filters-option">
                                    <li><a href="#">All<small>(722)</small></a></li>
                                    <li><a href="#">Hotel<small>(982)</small></a></li>
                                    <li><a href="#">Resort<small>(127)</small></a></li>
                                    <li class="active"><a href="#">Bed &amp; Breakfast<small>(222)</small></a></li>
                                    <li><a href="#">Condo<small>(158)</small></a></li>
                                    <li><a href="#">Residence<small>(439)</small></a></li>
                                    <li><a href="#">Guest House<small>(52)</small></a></li>
                                </ul>
                                <a class="button btn-mini">MORE</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel style1 arrow-right">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#amenities-filter" class="collapsed">Amenities</a>
                        </h4>
                        <div id="amenities-filter" class="panel-collapse collapse">
                            <div class="panel-content">
                                <ul class="check-square filters-option">
                                    <li><a href="#">Bathroom<small>(722)</small></a></li>
                                    <li><a href="#">Cable tv<small>(982)</small></a></li>
                                    <li class="active"><a href="#">air conditioning<small>(127)</small></a></li>
                                    <li class="active"><a href="#">mini bar<small>(222)</small></a></li>
                                    <li><a href="#">wi - fi<small>(158)</small></a></li>
                                    <li><a href="#">pets allowed<small>(439)</small></a></li>
                                    <li><a href="#">room service<small>(52)</small></a></li>
                                </ul>
                                <a class="button btn-mini">MORE</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel style1 arrow-right">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#language-filter" class="collapsed">Host Language</a>
                        </h4>
                        <div id="language-filter" class="panel-collapse collapse">
                            <div class="panel-content">
                                <ul class="check-square filters-option">
                                    <li><a href="#">English<small>(722)</small></a></li>
                                    <li><a href="#">Español<small>(982)</small></a></li>
                                    <li class="active"><a href="#">Português<small>(127)</small></a></li>
                                    <li class="active"><a href="#">Français<small>(222)</small></a></li>
                                    <li><a href="#">Suomi<small>(158)</small></a></li>
                                    <li><a href="#">Italiano<small>(439)</small></a></li>
                                    <li><a href="#">Sign Language<small>(52)</small></a></li>
                                </ul>
                                <a class="button btn-mini">MORE</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel style1 arrow-right">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#modify-search-panel" class="collapsed">Modify Search</a>
                        </h4>
                        <div id="modify-search-panel" class="panel-collapse collapse">
                            <div class="panel-content">
                                <form method="post">
                                    <div class="form-group">
                                        <label>destination</label>
                                        <input type="text" class="input-text full-width" placeholder="" value="Paris" />
                                    </div>
                                    <div class="form-group">
                                        <label>check in</label>
                                        <div class="datepicker-wrap">
                                            <input type="text" name="date_from" class="input-text full-width" placeholder="mm/dd/yy" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>check out</label>
                                        <div class="datepicker-wrap">
                                            <input type="text" name="date_to" class="input-text full-width" placeholder="mm/dd/yy" />
                                        </div>
                                    </div>
                                    <br />
                                    <button class="btn-medium icon-check uppercase full-width">search again</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <li class="swap-list <?= $viewType == '_search-list' ? 'active' : ''?>">
                            <?=Html::a('<i class="soap-icon-list"></i>',['/hotels/search', 'view'=>'_search-list'])?>
                        </li>
                        <li class="swap-grid <?= $viewType == '_search-grid' ? 'active' : ''?>">
                            <?=Html::a('<i class="soap-icon-grid"></i>',['/hotels/search', 'view'=>'_search-grid'])?>
                        </li>
                        <li class="swap-block <?= $viewType == '_search-block' ? 'active' : ''?>">
                            <?=Html::a('<i class="soap-icon-block"></i>',['/hotels/search', 'view'=>'_search-block'])?>
                        </li>
                    </ul>
                </div>


                   <?= \app\modules\main\components\widgets\SearchView::widget([
                        'preview' => $preview,
                        'viewType' => $viewType['name'],
                        'pageSize' => $viewType['perPage']
                       ])?>

                <a href="#" class="uppercase full-width button btn-large">load more listing</a>
            </div>
        </div>
    </div>
</div>
