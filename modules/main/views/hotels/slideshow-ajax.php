<div class="photo-gallery style1" id="photo-gallery1" data-animation="slide" data-sync="#image-carousel1">
    <ul class="slides">
        <?php foreach ($images as $image) : ?>
        <li><img class="galery-big-image" src="<?= \app\components\hotels\hotel\Hotel::IMAGES_BIG_URL.$image->path?>" alt="" /></li>

        <?php endforeach; ?>
    </ul>
</div>
<div class="image-carousel style1" id="image-carousel1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photo-gallery1">
    <ul class="slides">
        <?php foreach ($images as $image) : ?>
            <li><img class="gallery-small-image" src="<?= \app\components\hotels\hotel\Hotel::IMAGES_SMALL_URL.$image->path?>" alt="" /></li>

        <?php endforeach; ?>
    </ul>
</div>