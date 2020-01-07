<?php if (!defined('ABSPATH')) exit;
/* Template name: Cases */
get_header(); ?>

<?php
$featured_case = get_field('cases_featured_case');
$post = $featured_case;
setup_postdata($post);
?>
<div class="container-fluid py-5 bg-image bottom-gradient parallax-window" data-parallax="scroll" data-speed="0.5" data-image-src="<?= get_field('case_listing_featuredimage')['url']; ?>">
    <div class="container">
        <div class="row" style="min-height: 80vh;">
            <div class="col-12 align-self-end">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center text-lg-left text-light text-uppercase display-3 fjalla-one d-none d-lg-block text-shadow"><?php the_title(); ?></h1>
                        <h1 class="text-center text-lg-left text-light text-uppercase display-5 fjalla-one d-block d-lg-none text-shadow"><?php the_title(); ?></h1>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-12 col-lg-6 align-self-center">
                        <p class="text-light text-center text-lg-left"><?= get_the_excerpt(); ?></p>
                    </div>
                    <div class="col-12 col-lg-4 text-center text-lg-right align-self-center">
                        <a href="<?php the_permalink(); ?>" class="btn btn-outline-light btn-rounded special-link font-weight-bold text-lowercase">Ver Mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php wp_reset_postdata(); ?>

<div class="container-fluid py-5 bg-darkgray">
    <div class="container">
        <div class="row">
            <?php
            while(have_rows('cases_top')){
                the_row();
                $video = get_sub_field('video');
				$image = get_sub_field('image')['url'];
                $color = get_sub_field('color');
                $case = get_sub_field('case');
                $post = $case;
                setup_postdata($post);
                ?>
                <div class="col-12 col-lg-4 mb-3">
                    <div class="row justify-content-center">
                        <a href="<?php the_permalink(); ?>" class="col-11 story">
                            <div class="background" style="background-image:url('<?= $image; ?>');"></div>
                            <div class="content px-3">
                                <h1 class="text-center text-lg-left text-uppercase fjalla-one" style="color:<?= $color; ?>;" ><?php the_title(); ?></h1>
                                <p class="text-center text-lg-left text-light"><?= get_the_excerpt(); ?></p>
                            </div>
                            <video class="video" loop muted>
                                <source src="<?= $video; ?>" type="video/mp4">
                            </video>
                        </a>
                    </div>
                </div>
                <?php
                wp_reset_postdata();
            }
            ?>
        </div>
    </div>
</div>

<?php
$case_num = 0;
while(have_rows('cases_lists')){
    the_row();
    $title = get_sub_field('title');
    $subtitle = get_sub_field('subtitle');
    $cat = get_sub_field('category');
    $list_id = simple_uniqid();
    $query = new WP_Query(array(
        'post_type' => 'case',
        'status' => 'publish',
        'order' => 'DESC',
        'orderby' => 'date',
        'tax_query' => array(
            array(
                'taxonomy' => 'case_category',
                'field' => 'term_id',
                'terms' => $cat
            ),
        ),
    ));
    if($query->have_posts()){
        $cases = array();
        while($query->have_posts()){
            $query->the_post();
            $cases[] = array(
                'title' => get_the_title(),
                'link' => get_the_permalink(),
                'thumbnail' => get_field('case_listing_thumbnail')['url'],
                'logo' => get_field('case_listing_logo')['url'],
                'show_title' => get_field('case_listing_title'),
                'description' => get_field('case_listing_description'),
                'background' => get_field('case_listing_background')['url'],
                'color' => get_field('case_featured_color')
            );
        }
        wp_reset_postdata();
        ?>

<div class="container-fluid py-5 bg-darkgray">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h1 class="text-uppercase text-light text-center text-lg-left fjalla-one display-3 mb-0"><?= $title; ?></h1>
                <h1 class="text-lowercase text-pink text-center text-lg-left bayshore display-2 mb-0 title-up"><?= $subtitle; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-1 align-self-center p-0 text-left">
                <button type="button" class="prev-slide transparent text-light" data-slider="#carousel-nav-<?= $list_id; ?>"><i class="fas fa-chevron-left"></i></button>
            </div>
            <div class="col-10 align-self-center p-0">
                <div class="row cases-nav-carousel" id="carousel-nav-<?= $list_id; ?>" data-target-carousel="#carousel-<?= $list_id; ?>">
                <?php
                foreach($cases as $case){
                    ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="row justify-content-center">
                            <a href="<?= $case['link']; ?>" class="col-11 bg-image bottom-gradient d-block case-item" id="case-item-<?= $case_num; ?>" style="background-image:url('<?= $case['thumbnail'] ?>');">
                                <i class="fa fa-plus h1 plus text-light"></i>
                                <h3 class="text-uppercase text-light fjalla-one"><?= $case['title'] ?></h3>
                            </a>
                        </div>
                    </div>
                    <?php
                    $case_num++;
                }
                ?>
                </div>
            </div>
            <div class="col-1 align-self-center p-0 text-right">
                <button type="button" class="next-slide transparent text-light" data-slider="#carousel-nav-<?= $list_id; ?>"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</div>
<div class="cases-carousel-wrapper bg-darkgray">
    <div class="cases-carousel" id="carousel-<?= $list_id; ?>">
        <?php foreach($cases as $case){ ?>
        <div class="container-fluid py-5 case-item-show bg-image" style="background-image:url('<?= $case['background']; ?>');">
            <div class="container">
                <div class="row content">
                    <div class="col-12 col-lg-6 px-3 py-5 text-center text-lg-left">
                        <img src="<?= $case['logo']; ?>" alt="" class="img-fluid mb-3">
                        <h1 class="text-uppercase fjalla-one mb-3" style="color:<?= $case['color']; ?>"><?= $case['show_title']; ?></h1>
                        <p class="text-light mb-5"><?= $case['description']; ?></p>
                        <a href="<?= $case['link']; ?>" class="btn btn-rounded text-uppercase font-weight-bold special-link" style="background-color:<?= $case['color']; ?>">Ver Case</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

        <?php
    }
}
?>

<?php get_footer(); ?>