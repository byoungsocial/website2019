<?php if (!defined('ABSPATH')) exit;
/* Template name: Sobre Nós */
get_header(); ?>

<div class="container-fluid p-0 bg-image bottom-gradient parallax-window" data-parallax="scroll" data-speed="0.5" data-image-src="<?= get_field('top_background')['url']; ?>">
    <div class="container">
        <div class="row" style="min-height:80vh;">
            <div class="col-12 col-lg-8 align-self-end">
                <div class="row">
                    <div class="col-12">
                        <h1 class="display-1 fjalla-one text-pink text-uppercase text-center text-md-left text-shadow"><?php the_field('top_text'); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 bg-lightblue">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="text-center text-lg-left text-uppercase fjalla-one"><?php the_field('text1_title'); ?></h1>
                <p class="my-4 text-light text-center text-lg-left"><?php the_field('text1_text'); ?></p>
                <p class="text-center text-lg-left"><a href="<?php the_field('text1_button_link'); ?>" class="btn btn-outline-danger btn-rounded special-link text-uppercase font-weight-bold"><?php the_field('text1_button_text'); ?></a></p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 bg-image parallax-window" data-parallax="scroll" data-speed="0.5" data-image-src="<?= get_field('presentation_background')['url']; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-2 align-self-center">
                <h1 class="display-1 text-light text-center fjalla-one"><?php the_field('presentation_text'); ?></h1>
            </div>
            <div class="col-12 col-lg-10 text-center align-self-center">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="<?php the_field('presentation_embed_content'); ?>" class="embed-resposive-item" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 bg-pink">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="text-center text-lg-left text-uppercase text-light fjalla-one"><?php the_field('text2_title'); ?></h1>
                <p class="text-center text-lg-left my-3"><?php the_field('text2_text'); ?></p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-lg-9 align-self-center">
                <p class="text-uppercase font-weight-bold text-center text-lg-right"><?php the_field('text2_download_text'); ?></p>
            </div>
            <div class="col-12 col-lg-3 align-self-center">
                <h1 class="display-1 text-center text-lg-left"><a href="#" target="_blank" class="text-dark"><i class="fas fa-file-download"></i></a></h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 bg-image parallax-window" data-parallax="scroll" data-speed="0.5" data-image-src="<?= get_field('text3_background_image')['url']; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-lg-left display-1 fjalla-one"><?php the_field('text3_number'); ?></h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="text-pink text-uppercase fjalla-one text-center text-lg-left"><?php the_field('text3_title'); ?></h1>
                <p class="my-3 text-center text-lg-left"><?php the_field('text3_text'); ?></p>
                <p class="text-center text-lg-left"><a href="<?php the_field('text3_button_link'); ?>" class="btn btn-outline-danger btn-rounded special-link font-weight-bold text-uppercase"><?php the_field('text3_button_text'); ?></a></p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 bg-purple">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 align-self-center">
                <h1 class="text-center text-lg-left text-uppercase display-1 text-lightblue fjalla-one">04.</h1>
            </div>
            <div class="col-12 col-lg-6 align-self-center">
                <h1 class="text-center text-lg-right text-light text-uppercase fjalla-one">Vamos tomar um café e falar da sua estratégia de redes sociais?</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5  parallax-window" data-parallax="scroll" data-speed="0.5" data-image-src="<?= get_field('featured_image')['url']; ?>" style="min-height:95vh;"></div>

<?php get_footer(); ?>