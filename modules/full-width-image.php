<?php
$imageID = get_sub_field('image');
$image = wp_get_attachment_image_src($imageID, 'full');
$fileType = get_post_mime_type($imageID);
$imageAlt = get_post_meta($imageID, '_wp_attachment_image_alt', true);
?>

<div class="full-width-image <?php if($fileType == 'image/svg+xml') { ?>svg<?php } ?>">
    <div class="full-width-image__inner">
        <img src="<?php echo $image[0] ?>" class="full-width-image__image" alt="<?php echo $imageAlt ?>" />
    </div>
</div>