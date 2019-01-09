<?php
add_action( 'init', 'cpt_projects_init' );

function cpt_projects_init() {
    $types = array(
        "work" => array(
            'labels' => array(
                'name' => 'Work',
                'singular_name' => 'Work',
                'add_new' => 'Add New Work',
                'add_new_item' => 'Add New Work',
                'edit_item' => 'Edit Work',
                'new_item' => 'New Work',
                'all_items' => 'All Work',
                'view_item' => 'View Work',
                'search_items' => 'Search Work',
                'not_found' =>  'No Work Found',
                'not_found_in_trash' => 'No Work found in Trash',
                'parent_item_colon' => '',
                'menu_name' => 'Work',
            ),
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'work'),
            'query_var' => true,
            'menu_icon' => 'dashicons-portfolio',
            'hierarchical' => true,
            'supports' => array(
                'title'
            )
        ),
        "team" => array(
            'labels' => array(
                'name' => 'Team',
                'singular_name' => 'Team',
                'add_new' => 'Add New Team Member',
                'add_new_item' => 'Add New Team Member',
                'edit_item' => 'Edit Team',
                'new_item' => 'New Team Member',
                'all_items' => 'All Team Members',
                'view_item' => 'View Team',
                'search_items' => 'Search Team',
                'not_found' =>  'No Team Members Found',
                'not_found_in_trash' => 'No Team Members found in Trash',
                'parent_item_colon' => '',
                'menu_name' => 'Team',
            ),
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'team'),
            'query_var' => true,
            'menu_icon' => 'dashicons-groups',
            'hierarchical' => true,
            'supports' => array(
                'title'
            )
        )
    );

    foreach($types as $k => $v) {
        register_post_type($k, $v);
    }



//    register_taxonomy(
//        'event_category',
//        'event',
//        array(
//            'hierarchical' => true,
//            'label' => 'Event',
//            'query_var' => true,
//            'rewrite' => array( 'slug' => 'event-category' )
//        )
//    );
}
?>