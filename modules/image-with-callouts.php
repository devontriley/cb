<?php
$callouts = get_sub_field('callouts');
$callout1 = get_sub_field('callout_1');
$callout2 = ($callouts == 2) ? get_sub_field('callout_2') : null;
/* TODO: WP auto generate correct sizes for images or the publisher must upload multiple images */
$image = (get_sub_field('image')) ? get_sub_field('image') : 'https://via.placeholder.com/500x355.png';
?>

<div class="image-callouts" data-callouts="<?php echo $callouts ?>">
    <div class="image-callouts__inner">
        <div class="image-callouts__callout1">
            <?php echo $callout1 ?>
        </div>
        <div class="image-callouts__image">
            <picture>
                <?php if ($callouts == 1) { ?>
                    <source media="(min-width: 768px)" srcset="https://via.placeholder.com/2560x1685.png">
                    <img src="https://via.placeholder.com/500x326.png" alt="Chris standing up holding his daughter Elva">
                <?php } ?>
                <?php if ($callouts == 2) { ?>
                    <source media="(min-width: 768px)" srcset="https://via.placeholder.com/2560x970.png">
                    <img src="https://via.placeholder.com/500x355.png" alt="Chris standing up holding his daughter Elva">
                <?php } ?>
            </picture>
        </div>
        <?php if($callout2) { ?>
        <div class="image-callouts__callout2">
            <p><?php echo $callout2 ?></p>
        </div>
        <?php } ?>
    </div>
</div>
