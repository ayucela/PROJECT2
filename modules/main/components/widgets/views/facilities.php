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

                <?php foreach($model['facilities'] as $item):?>




                        <?php foreach ($facilities as $facility) : ?>

                            <?php if($facility == $item['description']['content']): ?>
                                <li  data-code ="<?= $item['description']['content']?>" class = "active"><a href="#"><?= $item['description']['content']?><small></small></a></li>
                            <?php else: ?>
                                <li  data-code ="<?= $item['description']['content']?>"><a href="#"><?= $item['description']['content']?><small></small></a></li>
                            <?php endif; ?>

                        <?php endforeach;?>




                <?php endforeach;?>

    </ul>
</div>


