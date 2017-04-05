<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 23.03.17
 * Time: 10:39
 */
?>

<h2>Amenities Style 02</h2>
<p>Maecenas vitae turpis condimentum metus tincidunt semper bibendum ut orci. Donec eget accumsan est. Duis laoreet sagittis elit et vehicula. Cras viverra posuere condimentum. Donec urna arcu, venenatis quis augue sit amet, mattis gravida nunc. Integer faucibus, tortor a tristique adipiscing, arcu metus luctus libero, nec vulputate risus elit id nibh.</p>
<ul class="amenities clearfix style2">
    <?php foreach ($icons as $icon) : ?>
        <li class="col-md-4 col-sm-6">
            <div class="icon-box style2"><i class="<?=$icon['class']?> circle"></i><?=$icon['description']?></div>
        </li>
    <?php endforeach; ?>
</ul>
