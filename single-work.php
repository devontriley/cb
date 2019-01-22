<?php get_header() ?>

<?php include(__DIR__ . '/modules/modules.php'); ?>

<?php
$workQuery = new WP_Query([
    'post_type' => 'work',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
]);
$work = $workQuery->posts;
$prev = null;
$next = null;
$counter = 0;
foreach($work as $w)
{
    if($w->ID == $post->ID)
    {
        if($counter == 0) {
            $prev = $work[count($work) - 1];
            $next = $work[$counter + 1];
        } else if($counter == count($work) - 1) {
            $prev = $work[$counter - 1];
            $next = $work[0];
        } else {
            $prev = $work[$counter - 1];
            $next = $work[$counter + 1];
        }
    }
    $counter++;
}
?>

<div class="work-nav">
    <div class="work-nav__inner">
        <div class="work-nav__prev">
            <a href="<?php echo get_permalink($prev->ID); ?>">
                ARROW LEFT<br />
                Previous
            </a>
        </div>
        <div class="work-nav__all">
            <a href="<?php echo bloginfo('url'); ?>/our-work">BOX HERE</a>
            View All Work
        </div>
        <div class="work-nav__next">
            <a href="<?php echo get_permalink($next->ID); ?>">
                ARROW RIGHT<br />
                Next
            </a>
        </div>
    </div>
</div>

<?php get_footer() ?>
