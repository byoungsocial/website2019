<?php if (!defined('ABSPATH')) exit;
/* Template name: Homepage */
get_header(); ?>

<div class="container-fluid p-0 text-center text-lg-left">
    <?php if(have_rows('top_carousel')){ ?>
    <div id="carousel">
        <?php while(have_rows('top_carousel')){the_row(); ?>
        <!-- <div class="item pt-5" style="background-image:url('<?= get_sub_field('background-image')['url']; ?>');height:720px;"> -->
		<div class="item pt-5 lazy" data-src="<?= get_sub_field('background-image')['url']; ?>" style="height:720px;">
            <!-- <div class="container pt-5" style="height:100%;"> -->
                <div class="row pt-5" style="height:100%;position:relative;z-index:1000;">
                    <div class="col-12 pt-5 col-lg-5 offset-lg-1 pl-0 pr-5 text-light align-self-center">
                        <h1 class="display-3 text-uppercase fjalla-one d-none d-lg-block text-shadow"><?php the_sub_field('title'); ?></h1>
                        <h1 class="display-5 text-uppercase fjalla-one d-block d-lg-none text-shadow"><?php the_sub_field('title'); ?></h1>
                        <p class="mt-3 mb-3 col-12 col-lg-9 px-0"><?php the_sub_field('text'); ?></p>
						<a href="<?php the_sub_field('link'); ?>" class="btn btn-outline-light btn-rounded font-weight-bold text-lowercase special-link">Ver Mais</a>
                    </div>
                </div>
            <!-- </div> -->
        </div>
        <?php } ?>
    </div>
    <?php } ?>

    <?php if(have_rows('top_carousel')){ ?>
    <div class="container px-0">
        <div class="row justify-content-end" style="position:relative;">
            <div class="col-12 col-lg-6" style="position:absolute;transform:translateY(-150%);">
                <div class="row">
                    <div class="col-1 text-right align-self-center p-0">
                        <button type="button" class="prev-slide transparent text-light" data-slider="#carousel-nav"><i class="fas fa-chevron-left"></i></button>
                    </div>
                    <div class="col-10 align-self-center" id="carousel-nav">
                        <?php while(have_rows('top_carousel')){the_row(); ?>
                        <!-- <img src="<?= get_sub_field('thumbnail')['sizes']['medium']; ?>" alt="" class="carousel-nav-item"> -->
						<img data-src="<?= get_sub_field('thumbnail')['sizes']['medium']; ?>" alt="" class="carousel-nav-item lazy">
                        <?php } ?>
                    </div>
                    <div class="col-1 text-left align-self-center p-0">
                        <button type="button" class="next-slide transparent text-light" data-slider="#carousel-nav"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<div class="container-fluid py-5 bg-darkgray">
    <div class="container px-0">
        <div class="row">
            <div class="col-12 d-none d-lg-block">
                <h1 class="text-light text-uppercase text-center text-lg-left fjalla-one mb-0 display-3"><?php the_field('stories_title'); ?></h1>
                <h1 class="text-pink text-lowercase text-center text-lg-left bayshore display-1 mb-0 title-up"><?php the_field('stories_subtitle'); ?></h1>
            </div>
            <div class="col-12 d-block d-lg-none">
                <h1 class="text-light text-uppercase text-center text-lg-left fjalla-one mb-0 display-5"><?php the_field('stories_title'); ?></h1>
                <h1 class="text-pink text-lowercase text-center text-lg-left bayshore display-4 mb-0 title-up"><?php the_field('stories_subtitle'); ?></h1>
            </div>
        </div>
        <div class="row">
            <?php
            while(have_rows('stories')){
                the_row();
                ?>
                <a href="<?php the_sub_field('case_link'); ?>" class="d-block col-6 col-md-3 mb-3">
                    <div class="row justify-content-center">
                        <div class="col-11 story">
                            <!-- <div class="background" style="background-image:url('<?= get_sub_field('image')['url']; ?>');"></div> -->
							<div class="background lazy" data-src="<?= get_sub_field('image')['url']; ?>"></div>
                            <!-- <img src="<?= get_sub_field('logo')['url']; ?>" alt="" class="img-responsive logo"> -->
							<img data-src="<?= get_sub_field('logo')['url']; ?>" alt="" class="img-responsive logo lazy">
                            <video class="video" loop muted>
                                <source src="<?php the_sub_field('video'); ?>" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<div class="container-fluid bg-darkgray">
    <div class="container px-0">
        <div class="row justify-content-end py-2 bg-colorgradient">
            <div class="col-10">
                <p class="text-right text-light text-lowercase text-right m-0"><?php the_field('presentation_text'); ?></p>
            </div>
            <div class="col-2">
                <p class="text-left m-0"><a href="<?php the_field('presentation_file'); ?>" target="_blank" class="text-info"><span class="d-inline-block" style="transform-origin:100% 0%;transform: scale(3);"><?php the_field('presentation_icon'); ?></span></a></p>
            </div>
        </div>
        <div class="row bg-light py-5">
            <div class="col-12 py-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8 d-none d-lg-block">
                        <h1 class="text-dark text-uppercase text-center fjalla-one display-3 mb-0"><?php the_field('about_tite'); ?></h1>
                        <h1 class="text-pink text-lowercase text-center bayshore display-2 mb-0 title-up"><?php the_field('about_subtitle'); ?></h1>
                    </div>
                    <div class="col-12 col-lg-8 d-block d-lg-none">
                        <h1 class="text-dark text-uppercase text-center fjalla-one display-5 mb-0"><?php the_field('about_tite'); ?></h1>
                        <h1 class="text-pink text-lowercase text-center bayshore display-4 mb-0 title-up"><?php the_field('about_subtitle'); ?></h1>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <p class="text-center text-dark mb-5"><?php the_field('about_text'); ?></p>
						<p class="text-center mt-5"><a href="<?php the_field('about_link'); ?>" class="btn btn-outline-dark btn-rounded font-weight-bold text-lowercase special-link">Saiba Mais</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 parallax-window" data-parallax="scroll" data-speed="0.5" data-image-src="<?= get_field('featuredcase_background')['url']; ?>">
    <!-- <div class="container py-5 px-0"> -->
        <div class="row py-5">
            <div class="col-12 col-lg-4 offset-lg-1 text-center text-lg-left text-light">
                <h1 class="text-uppercase fjalla-one d-none d-lg-block" style="font-size:144px;"><?php the_field('featuredcase_title'); ?></h1>
                <h1 class="text-uppercase fjalla-one display-1 d-block d-lg-none"><?php the_field('featuredcase_title'); ?></h1>
                <p class="mt-3 mb-5"><?php the_field('featuredcase_text'); ?></p>
				<a href="<?php the_field('featuredcase_case'); ?>" class="btn btn-outline-light btn-rounded font-weight-bold text-lowercase special-link">Veja o Case</a>
            </div>
        </div>
    <!-- </div> -->
</div>

<div class="container-fluid py-5 bg-darkgray">
    <div class="container px-0">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-12 d-none d-lg-block">
                        <h1 class="text-uppercase text-light text-center text-lg-left fjalla-one display-3 mb-0"><?php the_field('clientlist_title'); ?></h1>
                        <h1 class="text-lowercase text-pink text-center text-lg-left bayshore display-2 mb-0 title-up"><?php the_field('clientlist_subtitle'); ?></h1>
                    </div>
                    <div class="col-12 d-block d-lg-none">
                        <h1 class="text-uppercase text-light text-center text-lg-left fjalla-one display-5 mb-0"><?php the_field('clientlist_title'); ?></h1>
                        <h1 class="text-lowercase text-pink text-center text-lg-left bayshore display-4 mb-0 title-up"><?php the_field('clientlist_subtitle'); ?></h1>
                    </div>
                </div>
                <div class="row row-eq-height mt-3">
                    <?php while(have_rows('clientlist_logos')){the_row(); ?>
                    <div class="col-4 col-lg-3 align-self-center mb-4">
                        <div class="p-3 border border-light">
                            <!-- <img src="<?= get_sub_field('image')['sizes']['thumbnail']; ?>" alt="" class="img-fluid client-icon"> -->
							<img data-src="<?= get_sub_field('image')['sizes']['thumbnail']; ?>" alt="" class="img-fluid client-icon lazy">
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-lg-5 offset-lg-1 mt-5 mt-lg-0">
                <div class="row">
                    <div class="col-12 d-none d-lg-block">
                        <h1 class="text-uppercase text-light text-center text-lg-right fjalla-one display-3 mb-0"><?php the_field('form_title'); ?></h1>
                        <h1 class="text-lowercase text-pink text-center text-lg-right bayshore display-2 mb-0 title-up"><?php the_field('form_subtitle'); ?></h1>
                    </div>
                    <div class="col-12 d-block d-lg-none">
                        <h1 class="text-uppercase text-light text-center text-lg-right fjalla-one display-5 mb-0"><?php the_field('form_title'); ?></h1>
                        <h1 class="text-lowercase text-pink text-center text-lg-right bayshore display-4 mb-0 title-up"><?php the_field('form_subtitle'); ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="text-light text-center text-lg-right"><?php the_field('form_text'); ?></p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-center text-md-right">
                        <?php
                        $form = get_field("form_c7f");
                        $formId = $form->ID;
                        echo do_shortcode('[contact-form-7 id="'.$formId.'"]');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 bg-white">
    <div class="container px-0">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fjalla-one text-uppercase text-dark"><?php the_field('jobs_title'); ?></h1>
				<a href="<?php the_field('jobs_buttonlink'); ?>" target="_blank" class="btn btn-outline-danger btn-rounded font-weight-bold text-lowercase special-link mt-3"><?php the_field('jobs_buttontext'); ?></a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 bg-purplegradient">
    <div class="container px-0">
        <div class="row">
            <div class="col-12 d-none d-lg-block">
                <h1 class="text-uppercase text-light text-center text-lg-left fjalla-one display-3 mb-0"><?php the_field('blog_title'); ?></h1>
                <h1 class="text-lowercase text-pink text-center text-lg-left bayshore display-2 mb-0 title-up"><?php the_field('blog_subtitle'); ?></h1>
            </div>
            <div class="col-12 d-block d-lg-none">
                <h1 class="text-uppercase text-light text-center text-lg-left fjalla-one display-5 mb-0"><?php the_field('blog_title'); ?></h1>
                <h1 class="text-lowercase text-pink text-center text-lg-left bayshore display-4 mb-0 title-up"><?php the_field('blog_subtitle'); ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 magazine-layout">
                <?php
                $latestPosts = new WP_Query(array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'orderby' => 'date',
                    'posts_per_page' => 3
                ));
                while($latestPosts->have_posts()){
                    $latestPosts->the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>" class="magazine-post">
                        <div class="content">
                            <!-- <div class="background" style="background-image:url('<?php the_post_thumbnail_url(); ?>');"></div> -->
							<div class="background lazy" data-src="<?php the_post_thumbnail_url(); ?>"></div>
                            <div class="caption">
                                <h3 class="text-light text-uppercase fjalla-one"><?php the_title(); ?></h3>
                            </div>
                        </div>
                    </a>
                    <?php
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>