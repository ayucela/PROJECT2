<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 12.03.17
 * Time: 8:20
 */
?>
<div class="amenities">
    <?php for($i = 0; $i < 5; $i++) : ?>

        <?php if (isset($icons[$i])) { ?>
            <i class="<?=$icons[$i]['class']?>"  data-toggle="tooltip" data-placement="bottom"
                data-original-title="<?=$icons[$i]['description']?>"></i>
        <?php } ?>

    <?php endfor; ?>

</div>
