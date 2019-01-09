<?php
add_action('wp_ajax_nopriv_load_more_news_posts', 'load_more_news_posts');
add_action('wp_ajax_load_more_news_posts', 'load_more_news_posts');

function load_more_news_posts(){

    // This is how we can retrieve POST variables from ajax
    $data = json_decode(file_get_contents('php://input'));

    $perPage = 4;
    $currentPage = $data->currentPage;
    $currentOffset = 8 + ($currentPage * $perPage);

    $args = array(
        'post_type' => array('event', 'news'),
        'posts_per_page' => $perPage,
        'offset' => $currentOffset,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $ajax_query = new WP_Query( $args );

    if( $ajax_query->have_posts() ):

        $output;

        while( $ajax_query->have_posts() ): $ajax_query->the_post();

            $title = get_the_title();
            $date = get_the_date('d/m/y');
            $blurb = get_field('grid_description');
            $buttonUrl = get_permalink();
            $buttonLabel = 'Read More';

            $output .= '<div class="post-container">';
            $output .= '<a class="post-link" href="'. $buttonUrl .'"></a>';
            $output .= '<div class="inner">';
            $output .= '<p class="title">'. $title .'</p>';
            $output .= '<p class="date">'. $date .'</p>';
            $output .= '<div class="blurb">'. $blurb .'</div>';

            $output .=     '<div class="btn-wrapper">';
            $output .=    '<a class="btn" href="'. $buttonUrl .'"><span>'. $buttonLabel .'</span>';
            $output .=    '<svg viewbox="0 0 10 16"><use xlink:href="#button-arrow"></use></svg>';
            $output .=    '</a><!-- .btn -->';
            $output .=    '</div><!-- .btn-wrapper -->';

            $output .= '</div> <!-- .inner -->';
            $output .= '</div> <!-- .post-container -->';

        endwhile;

        wp_reset_postdata();
    endif;

    $dataOutput = array(
        'offset' => $ajax_query->post_count,
        'html' => $output
    );

    echo json_encode($dataOutput);

    exit;
}
?>