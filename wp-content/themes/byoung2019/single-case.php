<?php if (!defined('ABSPATH')) exit;
get_header();

if(have_posts()){
    while(have_posts()){
        the_post();
        $format = get_field('case_format');
        get_template_part("case", $format);
    }
}

get_footer(); ?>