<?php if (!defined('ABSPATH')) exit; ?>

<div class="container-fluid py-3 bg-purple" id="pre-footer">
    <div class="container px-0">
        <div class="row">
            <div class="col-12 col-lg-4 align-self-center">
                <p class="text-light text-center text-lg-left"><?php the_field('footer_newsletter_text', 'option'); ?></p>
                <p class="text-uppercase text-pink fjalla-one display-4 text-center text-lg-left"><?php the_field('footer_newsletter_title', 'option'); ?></p>
            </div>
            <div class="col-12 col-lg-8 align-self-center text-light">
                <?php
                echo do_shortcode(get_field('footer_newsletter_shortcode', 'option'));;
                ?>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid py-4 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 d-none d-lg-block align-self-center my-3">
                <p class="text-center text-lg-right text-dark"><?php the_field('footer_text', 'option'); ?></p>
            </div>
            <div class="col-12 col-lg-4 text-center align-self-center my-3">
                <img src="<?= get_field('footer_logo', 'option')['url']; ?>" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-lg-4 d-block d-lg-none align-self-center my-3">
                <p class="text-center text-lg-right text-dark"><?php the_field('footer_text', 'option'); ?></p>
            </div>
            <div class="col-12 col-lg-4 align-self-center my-3 d-none d-lg-block">
                <ul class="list-inline text-center text-lg-left">
                    <?php
                    while(have_rows('footer_social', 'option')){
                        the_row();
                        $icon = get_sub_field('icon', 'option');
                        $link = get_sub_field('link', 'option');
                        ?>
                        <li class="list-inline-item mx-3"><a href="<?= $link; ?>" class="text-dark"><?= $icon; ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<!-- Main JavaScript scripts -->
<script src="<?php location(); ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?php location(); ?>/js/popper.min.js"></script>
<script src="<?php location(); ?>/js/bootstrap.min.js"></script>
<script src="<?php location(); ?>/js/fa-all.min.js"></script>

<!-- Additional JavaScript plugins -->
<script src="<?php location(); ?>/js/aos.js"></script>
<script src="<?php location(); ?>/js/bootstrap-multiselect.js"></script>
<script src="<?php location(); ?>/js/jquery-ui.min.js"></script>
<script src="<?php location(); ?>/js/jquery.fittext.js"></script>
<script src="<?php location(); ?>/js/jquery.lettering.js"></script>
<script src="<?php location(); ?>/js/jquery.maskedinput.min.js"></script>
<script src="<?php location(); ?>/js/jquery.nicescroll.min.js"></script>
<script src="<?php location(); ?>/js/jquery.sticky.js"></script>
<script src="<?php location(); ?>/js/parallax.min.js"></script>
<script src="<?php location(); ?>/js/particles.min.js"></script>
<script src="<?php location(); ?>/js/slick.min.js"></script>
<script src="<?php location(); ?>/js/tilt.jquery.min.js"></script>
<script src="<?php location(); ?>/js/typed.js"></script>
<script src="<?php location(); ?>/js/jquery.lazy.min.js"></script>
<script src="<?php location(); ?>/js/Chart.min.js"></script>

<!-- Site JavaScript script -->
<script src="<?php location(); ?>/js/script.js"></script>
   
</body>
</html>