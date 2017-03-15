<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 12.03.17
 * Time: 22:54
 */
?>

<div class="panel-content">
    <ul class="check-square filters-option" id="amenities-filter">

        <?php
            $i =0;?>

                <?php foreach($model as $item):?>




                        <?php foreach ($facilities as $facility) : ?>

                            <?php if($facility == $item['description']): ?>
                                <li  data-code ="<?=$item['description']?>" class = "active"><a href="#"><?=$item['description']?><small>(722)</small></a></li>
                            <?php else: ?>
                                <li  data-code ="<?=$item['description']?>"><a href="#"><?=$item['description']?><small>(722)</small></a></li>
                            <?php endif; ?>

                        <?php endforeach;?>




                <?php endforeach;?>

    </ul>
</div>


