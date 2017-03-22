<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 22.03.17
 * Time: 10:26
 */

?>

<?php for($i = 0; $i < 5; $i++) : ?>


    <i class="<?=$icons[$i]['class']?> circle"  data-toggle="tooltip" data-placement="bottom"
       data-original-title="<?=$icons[$i]['description']?>"></i>
<?php endfor; ?>

