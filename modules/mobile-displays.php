<?php
$header = get_sub_field('header');
$images = get_sub_field('images');
?>

<div class="mobile-displays">
    <div class="mobile-displays__inner">
        <h3 class="mobile-displays__header">
            <?php echo $header ?>
        </h3>
        <div class="mobile-displays__images">
            <?php if($images) {
                foreach($images as $i) {
                    $imageID = $i['image'];
                    $image = wp_get_attachment_image_src($imageID, 'full'); ?>
                    <div class="mobile-displays__image">
                        <img src="<?php echo $image[0] ?>" />
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</div>