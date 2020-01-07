<?php if (!defined('ABSPATH')) exit; ?>
<?php get_header(); ?>

<div class="container-fluid py-5 bg-darkgray">
    <div class="container">
        <div class="row">
            <div class="col-12 d-none d-lg-block">
                <h1 class="text-uppercase text-light text-center text-lg-left fjalla-one display-3 mb-0"><?php single_cat_title(); ?></h1>
                <h1 class="text-lowercase text-pink text-center text-lg-left bayshore display-2 mb-0 title-up">Categoria</h1>
            </div>
            <div class="col-12 d-block d-lg-none">
                <h1 class="text-uppercase text-light text-center text-lg-left fjalla-one display-5 mb-0"><?php single_cat_title(); ?></h1>
                <h1 class="text-lowercase text-pink text-center text-lg-left bayshore display-4 mb-0 title-up">Categoria</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="list-inline text-center text-lg-left">
                    <?php
                    $categories = get_categories();
                    foreach($categories as $category){
                        ?>
                        <li class="list-inline-item mr-2 mb-2"><a href="<?= get_category_link($category->term_id); ?>" class="d-inline-block text-dark text-uppercase bg-light fjalla-one px-3 py-1 mb-0" style="text-decoration:none!important;"><?= $category->name; ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 bg-darkgray">
    <div class="container">
        <div class="row">
            <?php
            while(have_posts()){
                the_post();
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
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>