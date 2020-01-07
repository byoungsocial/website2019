<?php
if (!defined('ABSPATH')) exit;

require_once( __DIR__.'/includes/tgmpa/class-tgm-plugin-activation.php');

function require_plugins(){
    $plugins = array(
        // Advanced Custom Fields
        array(
            'name' => 'ACF Pro (from GitHub)',
            'slug' => 'advanced-custom-fields-pro',
            'version' => '5.8.0',
            'source' => get_bloginfo('template_url').'/includes/tgmpa/plugins/advanced-custom-fields-pro_5.8.0.zip',
            'required' => true
        ),

        // Breadcrumb NavXT
        array(
            'name' => 'Breadcrumb NavXT',
            'slug' => 'breadcrumb-navxt',
            'version' => '6.3.0',
            'source' => get_bloginfo('template_url').'/includes/tgmpa/plugins/breadcrumb-navxt.6.3.0.zip',
            'required' => false
        ),

        // Classic Editor
        array(
            'name' => 'Classic Editor',
            'slug' => 'classic-editor',
            'version' => '1.5',
            'source' => get_bloginfo('template_url').'/includes/tgmpa/plugins/classic-editor.1.5.zip',
            'required' => true
        ),

        // Font Organizer
        array(
            'name' => 'Font Organizer',
            'slug' => 'font-organizer',
            'version' => '2.1.1',
            'source' => get_bloginfo('template_url').'/includes/tgmpa/plugins/font-organizer.2.1.1.zip',
            'required' => false
        ),

        // Minify HTML Markup
        array(
            'name' => 'Minify HTML Markup',
            'slug' => 'minify-html-markup',
            'version' => '1.99',
            'source' => get_bloginfo('template_url').'/includes/tgmpa/plugins/minify-html-markup.zip',
            'required' => false
        ),

        // PinWorks+
        array(
            'name' => 'PinWorks Plus',
            'slug' => 'pinworksplus',
            'version' => '1.01',
            'source' => get_bloginfo('template_url').'/includes/tgmpa/plugins/pinworksplus.1.01.zip',
            'required' => true
        ),

        // Re-add Underline and Justify
        array(
            'name' => 'Re-add Underline and Justify',
            'slug' => 're-add-underline-justify',
            'version' => '0.2',
            'source' => get_bloginfo('template_url').'/includes/tgmpa/plugins/re-add-underline-justify.zip',
            'required' => false
        ),
    );

    $config = array(
        'id' => 'rbf_tgmpa',
        'menu' => 'rbf_tgmpa',
        'parent_slug' => 'themes.php',
    );

    tgmpa($plugins, $config);
}

function ThemeSetup(){
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
    add_theme_support("custom-logo");
    add_theme_support("html5");
    add_theme_support("automatic-feed-links");
    register_nav_menus(array(
        'primary' => 'Menu Principal',
        'secondary' => 'Menu Secundário'
    ));
}

function ExcerptEnding($more){
    return "...";
}

function ExcerptLegth($length){
    return 20;
}

function get_custom_logo_url(){
    return wp_get_attachment_image_src(get_theme_mod('custom_logo'), "full")[0];
}

function get_menu_items($menu_location = ""){
    return wp_get_nav_menu_items(get_nav_menu_locations()[$menu_location]);
}

function location(){
    echo get_bloginfo('template_url');
}

function simple_uniqid(){
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $uniqid = '';
    for($i = 0; $i < 10; $i++){
        $uniqid .= $chars[rand(0, strlen($chars)-1)];
    }
    return $uniqid;
}

function AjaxPostContent(){
    $query = new WP_Query(array(
        'p' => $_POST['post_id']
    ));

    if($query->have_posts()){
        $query->the_post();
        get_template_part("content-post");
    }

    die();
}

function AjaxBlogPage(){
    $query = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'order' => 'DESC',
        'orderby' => 'date',
        'paged' => $_POST['blog_page']
    ));

    while($query->have_posts()){
        $query->the_post();
        ?>
        <div class="col-12 col-md-6 col-lg-4 mb-5">
            <a href="<?php the_permalink(); ?>" class="d-block bg-image post-listing-thumbnail" style="background-image:url('<?php the_post_thumbnail_url(); ?>');"></a>
            <div class="px-1">
                <p class="mb-0"><a href="<?php the_permalink(); ?>" class="d-inline-block text-light text-center text-lg-left fjalla-one text-uppercase h4 pt-3 mb-0 post-listing-title"><?php the_title(); ?></a></p>
                <p class="mb-0"><a href="<?php the_permalink(); ?>" class="d-inline-block text-light text-center text-lg-left font-weight-bold post-listing-date"><?= get_the_date(); ?></a></p>
                <p class="text-light text-center text-lg-left"><?= get_the_excerpt(); ?></p>
                <p class="m-0"><a href="<?= get_category_link(get_the_category()[0]->term_id); ?>" class="d-inline-block bg-light text-dark px-3 pb-1 m-0" style="text-decoration:none!important;"><small><?= get_the_category()[0]->cat_name; ?></small></a></p>
            </div>
        </div>
        <?php
    }

    $nextBlogPage = -1;
    if($_POST['blog_page'] < $query->max_num_pages){
        $nextBlogPage = $_POST['blog_page'] + 1;
    }

    ?>
    <div class="container-fluid text-center text-light pb-3 bg-darkgray" id="nextBlogPage">
        <script>
            nextBlogPage = <?= $nextBlogPage; ?>;
        </script>
    </div>
    <?php

    die();
}

add_action('tgmpa_register', 'require_plugins');
add_action("after_setup_theme", "ThemeSetup");
add_filter("excerpt_more", "ExcerptEnding");
add_filter("excerpt_length", "ExcerptLegth");
add_action("wp_ajax_get_post_content", "AjaxPostContent");
add_action("wp_ajax_nopriv_get_post_content", "AjaxPostContent");
add_action("wp_ajax_get_blog_page", "AjaxBlogPage");
add_action("wp_ajax_nopriv_get_blog_page", "AjaxBlogPage");

/* Migration */

function AjaxAddPost(){
    $title = $_POST['post_title'];
    $content = $_POST['post_content'];
    $date = $_POST['post_date'];
    $slug = $_POST['post_slug'];
    $thumbnail = $_POST['post_thumbnail'];

    $meta = json_decode(str_replace('\\', '', $_POST['post_meta']));

    $tags = json_decode(str_replace('\\', '', $_POST['post_tags']));
    $postTags = array();
    foreach($tags as $tag){
        $postTags[] = $tag->name;
    }

    $categories = json_decode(str_replace('\\', '', $_POST['post_categories']));
    $postCategories = array();
    foreach($categories as $category){
        $categoryId = term_exists($category->slug, 'category');
        //var_dump($categoryId);
        if($categoryId){
            $postCategories[] = $categoryId['term_id'];
        } else {
            $newCategory = wp_insert_category(array(
                'cat_name' => $category->name,
                'category_nicename' => $category->slug,
            ));
            if($newCategory){
                $postCategories[] = $newCategory;
            } else {
                $postCategories[] = 1;
            }
        }
    }

    $status = "publish";
    $user = 1;

    var_dump($postCategories);
    echo "<br><hr><hr><br>";
    var_dump($postTags);

    $postId = wp_insert_post(array(
        'post_author' => $user,
        'post_date' => $date,
        'post_content' => $content,
        'post_title' => $title,
        'post_status' => $status,
        'post_name' => $slug,
        'post_category' => $postCategories,
        'tags_input' => $postTags,
        'meta_input' => $meta
    ));

    if(is_wp_error($postId)){
        var_dump($postId->get_error_messages());
    } else {
        $image = "";
        if($thumbnail != ""){
            $name = explode("/", $thumbnail);
            $name = $name[count($name) - 1];
            $file = array();
            $file['name'] = $name;
            $file['tmp_name'] = download_url($thumbnail);

            if(is_wp_error($file['tmp_name'])){
                @unlink($file['tmp_name']);
                var_dump($file['tmp_name']->get_error_messages());
            } else {
                $attachmentId = media_handle_sideload($file, $postId);

                if(is_wp_error($attachmentId)){
                    @unlink($file['tmp_name']);
                    var_dump($file['tmp_name']->get_error_messages());
                } else {
                    if(set_post_thumbnail($postId, $attachmentId)){
                        echo $postId;
                    } else {
                        echo "Error setting post thumbnail";
                    }
                }
            }
        }
    }

    die();
}

add_action("wp_ajax_add_post", "AjaxAddPost");
add_action("wp_ajax_nopriv_add_post", "AjaxAddPost");

remove_action('login_init', 'send_frame_options_header', 10, 0);
remove_action('admin_init', 'send_frame_options_header', 10, 0);