<?php
$title = get_sub_field('title');
$copy = get_sub_field('copy');
$imageID = get_sub_field('image');
$image = wp_get_attachment_image_src($imageID, 'full');
?>

<div class="module-50-50">
    <div class="module-50-50__inner">
        <div class="module-50-50__copy">
            <h2><?php echo $title ?></h2>
            <?php echo $copy ?>
        </div>
        <div class="module-50-50__image">
            <img src="<?php echo $image[0] ?>" />
        </div>
    </div>
</div>