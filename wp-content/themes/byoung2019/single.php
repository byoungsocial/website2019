<?php if (!defined('ABSPATH')) exit; ?>
<?php get_header(); ?>

<?php
while(have_posts()){
    the_post();
    get_template_part("content-post");
}
?>

<?php get_footer(); ?>