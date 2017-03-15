<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 12.03.17
 * Time: 22:54
 */
?>

<div class="panel-content">
    <ul class="check-square filters-option" id="accomodations-filter">
        <?php foreach($model as $item):?>
            <?php foreach ($accs as $acc) : ?>
                <?php if($acc == $item['code']): ?>
                    <li  data-code ="<?=$item['code']?>" class = "active"><a href="#"><?=$item['typeMultiDescription']['content']?><small>(722)</small></a></li>
                <?php else: ?>
                    <li  data-code ="<?=$item['code']?>"><a href="#"><?=$item['typeMultiDescription']['content']?><small>(722)</small></a></li>
                <?php endif; ?>
            <?php endforeach;?>
        <?php endforeach; ?>
    </ul>
    <a class="button btn-mini">MORE</a>
</div>
