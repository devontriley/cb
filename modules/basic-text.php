<?php
$blueBackground = get_sub_field('blue_background');
$greyBackground = get_sub_field('grey_background');
$align = get_sub_field('align');
$header = get_sub_field('header');
$body = get_sub_field('body');
$body2 = get_sub_field('body_2');
?>

<div class="basic-text <?php if($blueBackground){ echo 'blue-background'; }?> <?php if($greyBackground){ echo 'grey-background'; }?> <?php if($align) { echo 'align-'.$align; } ?>">
    <div class="basic-text__inner" data-columns="<?php echo ($body2) ? '2' : '1' ?>">
        <?php if($header) { ?>
            <h3><?php echo $header ?></h3>
        <?php } ?>
        <div class="basic-text__columns">
            <?php if($body) { ?>
                <div class="basic-text__column" data-columns="<?php echo ($body2) ? '2' : '1' ?>">
                    <?php echo $body ?>
                </div>
            <?php } ?>
            <?php if($body2) { ?>
                <div class="basic-text__column" data-columns="<?php echo ($body2) ? '2' : '1' ?>">
                    <?php echo $body2 ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>