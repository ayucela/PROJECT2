<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
//$this->context->layout = '../admin';
$this->title = $name;
?>
<div class="site-error">

    <?php if ($exception->statusCode !== 503) { ?>
        <h1><?php echo Html::encode($this->title) ?></h1>
    <?php } else { ?>
        <h1>Service is unavailable now. Please, retry later.</h1>
    <?php } ?>
    
</div>
