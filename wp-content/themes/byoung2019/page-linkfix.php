<?php

$query = new WP_Query(array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'order' => 'DESC',
    'orderby' => 'date',
    'posts_per_page' => -1
));

while($query->have_posts()){
    $query->the_post();

    $postId = get_the_ID();
    $postContent = get_the_content();

    $newPostContent = str_replace("http://localhost/byoung/site/", "https://b-young.me/", $postContent);

    wp_insert_post(array(
        'ID' => $postId,
        'post_content' => $newPostContent
    ));

    echo "Post ".get_the_title()." (ID ".$postId.") fixed.<br><br>";
}

?>