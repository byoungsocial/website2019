<?php if (!defined('ABSPATH')) exit; ?>

<?php $color = get_field('case_featured_color'); ?>

<div class="container-fluid py-5 bg-image bottom-gradient parallax-window" data-parallax="scroll" data-speed="0.5" data-image-src="<?php the_post_thumbnail_url(); ?>">
    <div class="container">
        <div class="row" style="min-height:50vh;">
            <div class="col-12 align-self-end">
                <h1 class="display-1 text-uppercase text-light fjalla-one d-none d-lg-block text-shadow"><?php the_title(); ?></h1>
                <h1 class="display-5 text-uppercase text-light fjalla-one d-block d-lg-none text-shadow"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 bg-darkgray">
    <div class="container">
        <div class="row">
            <div class="col-12 text-light text-center text-lg-left">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <?php
                $postid = get_the_ID();
                $tags = wp_get_post_tags(get_the_ID());
                if(count($tags) > 0){
                    ?>
                    <ul class="list-inline text-center text-lg-left">
                        <?php
                        foreach($tags as $tag){
                            ?>
                            <li class="list-inline-item mr-3 mb-3 px-5 py-2 font-weight-bold x-rounded" style="background-color:<?= $color; ?>"><?= $tag->name; ?></li>
                            <?php
                        }
                        ?>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
if(have_rows("case-contents")){
?>
<div class="container-fluid bg-darkgray">
    <div class="container">
        <?php get_template_part("case-part-content"); ?>
    </div>
</div>
<?php
}
?>

<div class="container-fluid bg-darkgray">
    <div class="container bg-light py-5">
        <div class="row">
            <div class="col-12">
                <?php
                $pin_user = get_field("case_pinterest_user");
                $pin_folder = get_field("case_pinterest_board");
                $shortcode = "[pinworks+ type='board' user='".$pin_user."' board='".$pin_folder."' header='yes' gallery='yes' captions='yes' transition='fadeIn' ]";
                echo do_shortcode($shortcode);
                ?>
            </div>
        </div>
    </div>
</div>