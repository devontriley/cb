<?php
$moduleTitle = get_sub_field('title');
$teamMembers = new WP_Query([
    'post_type' => 'team',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
]);
?>

<div class="team-profiles">
    <div class="team-profiles__inner">
        <h2 class="team-profiles__header">
            <?php echo $moduleTitle ?>
        </h2>
        <ul class="team-profiles__slider">
            <?php
            if($teamMembers)
            {
                foreach($teamMembers->posts as $t)
                {
                    $name = $t->post_title;
                    $title = get_field('title', $t->ID);
                    $headshotID = get_field('headshot', $t->ID);
                    $headshot = wp_get_attachment_image_src($headshotID, 'full');
                    ?>
                    <li>
                        <div class="team-profiles__headshot">
                            <img src="<?php echo $headshot[0] ?>" />
                        </div>
                        <h3><?php echo $name ?></h3>
                        <?php echo $title ?>
                    </li>
                <?php }
            }
            ?>
        </ul>
        <div class="team-profiles__slider-nav">
            <div class="team-profiles__slider-handle"></div>
        </div>
    </div>
</div>

