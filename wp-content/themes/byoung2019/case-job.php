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
            <div class="col-12 text-light">
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

<!-- <div class="container-fluid py-5" style="background-color:<?= $color; ?>">
    <div class="container">
        <div class="row">
            <?php while(have_rows('case_statistics')){the_row(); ?>
                <div class="col-12 col-lg-4">
                    <h1 class="text-center text-uppercase fjalla-one display-1"><?php the_sub_field('value'); ?></h1>
                    <h1 class="text-center text-lowercase bayshore text-light display-4"><?php the_sub_field('title'); ?></h1>
                </div>
            <?php } ?>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-lg-6 offset-lg-3">
                <h1 class="text-center text-uppercase fjalla-one text-light"><span class="border border-dark px-4 py-3"><?php the_field('case_team_title'); ?></span></h1>
            </div>
            <div class="col-12 col-lg-3 text-center text-lg-right">
                <p class="my-0"><small>Time Exclusivo <i class="fas fa-square"></i></small></p>
                <p class="my-0"><small>Time Compartilhado <i class="fas fa-square text-light"></i></small></p>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <?php
            while(have_rows('case_team')){
                the_row();
                $color_class = "text-dark";
                if(get_sub_field('disposal') == 'shared'){
                    $color_class = "text-light";
                }
                ?>
                <div class="col-12 col-md-4 col-lg text-center member <?= $color_class; ?>">
                    <span class="number rounded-circle bg-light"><h6 class="text-dark"><?php the_sub_field('amount'); ?></h6></span>
                    <p class="h2"><?php the_sub_field('icon'); ?></p>
                    <h5 class="mt-3 text-uppercase font-weight-bold"><?php the_sub_field('office'); ?></h5>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div> -->

<div class="container-fluid py-5" style="background-color: <?= $color; ?>">
	<div class="container">
		<div class="row border-bottom border-dark">
			<div class="col-12 col-md-9">
				<h1 class="text-uppercase fjalla-one text-light"><?php the_field('case_team_title'); ?></h1>
			</div>
			<div class="col-12 col-md-3 text-center text-lg-right">
                <p class="my-0"><small>Time Exclusivo <i class="fas fa-square"></i></small></p>
                <p class="my-0"><small>Time Compartilhado <i class="fas fa-square text-light"></i></small></p>
            </div>
		</div>
		<div class="row mt-5">
			<?php
            while(have_rows('case_team')){
                the_row();
                $color_class = "text-dark";
                if(get_sub_field('disposal') == 'shared'){
                    $color_class = "text-light";
                }
                ?>
                <div class="col-12 col-md-4 col-lg-2 text-center member <?= $color_class; ?>">
                    <span class="number"><h5 class="text-dark"><?php the_sub_field('amount'); ?></h5></span>
                    <p class="h1 rounded-circle border border-light member-icon"><?php the_sub_field('icon'); ?></p>
                    <p class="mt-3 text-lowercase font-weight-bold"><?php the_sub_field('office'); ?></p>
                </div>
                <?php
            }
            ?>
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