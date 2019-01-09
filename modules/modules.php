<?php

if(have_rows('modules')) :
    while(have_rows('modules')) :
        the_row();
        switch(get_row_layout()){
            case 'hero':
                include('hero.php');
                break;

            case 'basic_text':
                include('basic-text.php');
                break;

            case 'image_with_callouts':
                include('image-with-callouts.php');
                break;

            case 'full_width_svg':
                include('full-width-svg.php');
                break;

            case 'team_profiles':
                include('team-profiles.php');
                break;

            case 'image_four_callouts':
                include('image-four-callouts.php');
                break;

            case '5050':
                include('50-50.php');
                break;

            case 'text_grid':
                include('text-grid.php');
                break;

            case 'quote_slider':
                include('quote-slider.php');
                break;

            case 'work_grid':
                include('work-grid.php');
                break;

            case 'image_grid':
                include('image-grid.php');
                break;

            case 'tab_system':
                include('tab-system.php');
                break;
        }
    endwhile;
endif;

?>