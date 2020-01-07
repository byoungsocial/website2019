<?php if (!defined('ABSPATH')) exit; ?>

<article data-title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>">

<!-- <div class="container-fluid bg-image featured-image" style="background-image:url('<?php the_post_thumbnail_url(); ?>');"> -->
<div class="container-fluid featured-image parallax-window" data-parallax="scroll" data-speed="0.5" data-image-src="<?php the_post_thumbnail_url(); ?>">
    <div class="container">
        <div class="row pt-5" style="min-height: 90vh;">
            <div class="col-12 align-self-center mt-5">
                <h1 class="display-4 text-center text-uppercase fjalla-one text-light d-none d-lg-block text-shadow"><?php the_title(); ?></h1>
                <h1 class="text-center text-uppercase fjalla-one text-light d-block d-lg-none text-shadow"><?php the_title(); ?></h1>
                <p class="h5 text-center text-light"><?php the_author(); ?> &times; <?php the_date(); ?> &times; <?= get_the_category()[0]->cat_name; ?></p>
            </div>
            <div class="col-12 align-self-end text-center">
                <button class="post-scroll text-light h2 transparent floater"><i class="fa fa-chevron-down"></i></button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 bg-darkgray" data-title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>">
    <div class="container">
        <div class="row col-12">
            <ul class="list-inline text-center text-lg-left">
                <?php
                $postid = get_the_ID();
                $tags = wp_get_post_tags(get_the_ID());
                foreach($tags as $tag){
                    ?>
                    <li class="list-inline-item mr-3 my-0 text-pink font-weight-bold font-italic">#<?= $tag->name; ?></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="row">
            <div class="col-12 text-light post-content">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <ul class="list-inline text-center">
                    <li class="list-inline-item mr-2"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="d-block px-5 py-2 text-light h3" style="background-color:#3b5998;"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item mr-2"><a href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank" class="d-block px-5 py-2 text-light h3" style="background-color:#1da1f2;"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item mr-2"><a href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>" target="_blank" class="d-block px-5 py-2 text-light h3" style="background-color:#bd081c;"><i class="fab fa-pinterest"></i></a></li>
                    <li class="list-inline-item mr-2"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank" class="d-block px-5 py-2 text-light h3" style="background-color:#0e76a8;"><i class="fab fa-linkedin-in"></i></a></li>
                    <li class="list-inline-item mr-2"><a href="mailto:?body=<?php the_permalink(); ?>" target="_blank" class="d-block px-5 py-2 text-light h3" style="background-color:#000000;"><i class="fas fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

</article>

<?php
$nextPost = get_adjacent_post();
$nextId = -1;
if($nextPost){
    $nextId = $nextPost->ID;
}
?>
<div class="container-fluid text-center text-light pb-3 bg-darkgray" id="nextPostContent">
    <script>
        nextPostId = <?= $nextId; ?>;
    </script>
</div>