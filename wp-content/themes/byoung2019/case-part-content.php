<?php if (!defined('ABSPATH')) exit; ?>
<?php
$color = get_field('case_featured_color');
while(have_rows('case-contents')){
    the_row();
    $type = get_sub_field('content-type');
    switch($type){
        case 'static-image':
        ?>
        <div class="row">
            <div class="col-12 text-center p-0">
                <img src="<?= get_sub_field('image')['url']; ?>" alt="" class="img-fluid">
            </div>
        </div>
        <?php
        break;
        case 'carousel':
        ?>
        <div class="row" style="background-color: <?= $color; ?>;">
            <div class="col-1 text-left align-self-center p-0">
                <button type="button" class="prev-slide transparent text-light" data-slider="#case_banner_carousel"><i class="fas fa-caret-left"></i></button>
            </div>
            <div class="col-10" id="case_banner_carousel">
                <?php
                while(have_rows('carousel')){the_row();
                    ?>
                    <img src="<?= get_sub_field('carousel-image')['url']; ?>" alt="" class="img-fluid">
                    <?php
                }
                ?>
            </div>
            <div class="col-1 text-right align-self-center p-0">
                <button type="button" class="next-slide transparent text-light" data-slider="#case_banner_carousel"><i class="fas fa-caret-right"></i></button>
            </div>
        </div>
        <?php
        break;
        case 'video':
        ?>
        <div class="row">
            <div class="col-12 p-0">
                <div class="embed-responsive embed-responsive-16by9">
                    <video src="<?php the_sub_field('video'); ?>" class="embed-responsive-item" controls></video>
                </div>
            </div>
        </div>
        <?php
        break;
        case 'yt-video':
        ?>
        <div class="row">
            <div class="col-12 p-0">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://youtube.com/embed/<?php the_sub_field('youtube-video'); ?>" frameborder="0" class="embed-responsive-item"></iframe>
                </div>
            </div>
        </div>
        <?php
        break;
        case 'statistics':
		if(get_sub_field('enable-background-image')){ ?>
			<div class="row pt-4 bottom-gradient bg-image" style="background-image:url('<?= get_sub_field('background-image')['url']; ?>');">
		<?php } else { ?>
			<div class="row pt-4 bottom-gradient" style="background-color: <?= $color; ?>;">
		<?php } ?>
            <div class="col-12 col-md-6 align-self-center">
                <?php
                    while(have_rows('statistics')){
                        the_row();
                        ?>
                        <div class="row">
                            <div class="col-6 align-self-center text-right">
                                <h1 class="display-2 text-light text-uppercase fjalla-one"><?php the_sub_field('value'); ?></h1>
                            </div>
                            <div class="col-6 align-self-center text-left">
                                <p class="text-light text-lowercase font-weight-bold"><?php the_sub_field('title'); ?></p>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
            <div class="col-12 col-md-6 text-center align-self-end">
                <img src="<?= get_sub_field('image')['url']; ?>" class="img-fluid">
            </div>
        </div>
        <?php
        break;
        case 'statistics-rtl':
        if(get_sub_field('enable-background-image')){ ?>
			<div class="row pt-4 bottom-gradient bg-image" style="background-image:url('<?= get_sub_field('background-image')['url']; ?>');">
		<?php } else { ?>
			<div class="row pt-4 bottom-gradient" style="background-color: <?= $color; ?>;">
		<?php } ?>
            <div class="col-12 col-md-6 text-center align-self-end">
                <img src="<?= get_sub_field('image')['url']; ?>" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 align-self-center">
                <?php
                    while(have_rows('statistics')){
                        the_row();
                        ?>
                        <div class="row">
                            <div class="col-6 align-self-center text-right">
                                <p class="text-light text-lowercase font-weight-bold"><?php the_sub_field('title'); ?></p>
                            </div>
                            <div class="col-6 align-self-center text-left">
                                <h1 class="display-2 text-light text-uppercase fjalla-one"><?php the_sub_field('value'); ?></h1>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
        <?php
        break;
        case 'chart-only':
        $chart_type = get_sub_field('chart-type');
        $chart_title = get_sub_field('chart-title');
        $chart_color = get_sub_field('chart-color');
		$chart_align = get_sub_field('chart-align');
        $chart_data_array = array();
        while(have_rows('chart-content')){
            the_row();
            $chart_data_array[] = array(
                'name' => get_sub_field('name'),
                'value' => get_sub_field('value')
            );
        }
        $chart_data = htmlspecialchars(json_encode($chart_data_array), ENT_QUOTES, 'UTF-8');
        if(get_sub_field('enable-background-image')){ ?>
			<div class="row p-2 p-md-4 bg-image <?= $chart_align; ?>" style="background-image:url('<?= get_sub_field('background-image')['url']; ?>');">
		<?php } else { ?>
			<div class="row p-2 p-md-4 <?= $chart_align; ?>" style="background-color: <?= $color; ?>;">
		<?php } ?>
            <div class="col-12 col-md-8 px-3 <?= get_sub_field('enable-background-image') ? "bg-light p-4" : ""; ?>">
                <canvas class="case-chart" width="960" height="540" data-chart-type="<?= $chart_type; ?>" data-chart-data="<?= $chart_data; ?>" data-chart-description="<?= $chart_title; ?>" data-chart-color="<?= $chart_color; ?>"></canvas>
            </div>
        </div>
        <?php
        break;
        case 'chart-content':
        if(get_sub_field('enable-background-image')){ ?>
			<div class="row p-2 p-md-4 bg-image" style="background-image:url('<?= get_sub_field('background-image')['url']; ?>');">
		<?php } else { ?>
			<div class="row p-2 p-md-4" style="background-color: <?= $color; ?>;">
		<?php } ?>
            <div class="col-12 col-md-6 col-lg-5 align-self-end text-center">
                <img src="<?= get_sub_field('image')['url']; ?>" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 col-lg-7">
                <div class="row mb-3">
                    <div class="col-12">
                        <h1 class="text-center text-md-left text-light font-weight-bold fjalla-one"><?= get_sub_field('content-title'); ?></h1>
                    </div>
                    <div class="col-12 text-center text-md-left text-light">
                        <?php the_sub_field('content'); ?>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $chart_type = get_sub_field('chart-type');
                    $chart_title = get_sub_field('chart-title');
                    $chart_color = get_sub_field('chart-color');
                    $chart_data_array = array();
                    while(have_rows('chart-content')){
                        the_row();
                        $chart_data_array[] = array(
                            'name' => get_sub_field('name'),
                            'value' => get_sub_field('value')
                        );
                    }
                    $chart_data = htmlspecialchars(json_encode($chart_data_array), ENT_QUOTES, 'UTF-8');
                    ?>
                    <div class="col-12 <?= get_sub_field('enable-background-image') ? "bg-light" : ""; ?>">
                        <canvas class="case-chart" width="960" height="540" data-chart-type="<?= $chart_type; ?>" data-chart-data="<?= $chart_data; ?>" data-chart-description="<?= $chart_title; ?>" data-chart-color="<?= $chart_color; ?>"></canvas>
                    </div>
                    <?php
                    ?>
                </div>
            </div>
        </div>
        <?php
        break;
        case 'chart-content-rtl':
        if(get_sub_field('enable-background-image')){ ?>
			<div class="row bg-image" style="background-image:url('<?= get_sub_field('background-image')['url']; ?>');">
		<?php } else { ?>
			<div class="row" style="background-color: <?= $color; ?>;">
		<?php } ?>
            <div class="col-12 col-md-6 col-lg-7">
                <div class="row mb-3">
                    <div class="col-12">
                        <h1 class="text-center text-md-right text-light font-weight-bold fjalla-one"><?= get_sub_field('content-title'); ?></h1>
                    </div>
                    <div class="col-12 text-center text-md-right text-light">
                        <?php the_sub_field('content'); ?>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $chart_type = get_sub_field('chart-type');
                    $chart_title = get_sub_field('chart-title');
                    $chart_color = get_sub_field('chart-color');
                    $chart_data_array = array();
                    while(have_rows('chart-content')){
                        the_row();
                        $chart_data_array[] = array(
                            'name' => get_sub_field('name'),
                            'value' => get_sub_field('value')
                        );
                    }
                    $chart_data = htmlspecialchars(json_encode($chart_data_array), ENT_QUOTES, 'UTF-8');
                    ?>
                    <div class="col-12 <?= get_sub_field('enable-background-image') ? "bg-light" : ""; ?>">
                        <canvas class="case-chart" width="960" height="540" data-chart-type="<?= $chart_type; ?>" data-chart-data="<?= $chart_data; ?>" data-chart-description="<?= $chart_title; ?>" data-chart-color="<?= $chart_color; ?>"></canvas>
                    </div>
                    <?php
                    ?>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-5 align-self-end text-center">
                <img src="<?= get_sub_field('image')['url']; ?>" alt="" class="img-fluid">
            </div>
        </div>
        <?php
        break;
        case 'content':
        if(get_sub_field('enable-background-image')){ ?>
			<div class="row p-2 p-md-4 bg-image" style="background-image:url('<?= get_sub_field('background-image')['url']; ?>');">
		<?php } else { ?>
			<div class="row p-2 p-md-4" style="background-color: <?= $color; ?>;">
		<?php } ?>
            <div class="col-12 col-md-6 col-lg-5 align-self-end text-center">
                <img src="<?= get_sub_field('image')['url']; ?>" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 col-lg-7 align-self-center">
                <h1 class="text-center text-md-left fjalla-one text-light font-weight-bold"><?php the_sub_field('content-title'); ?></h1>
                <div class="text-center text-md-left">
                    <?php the_sub_field('content'); ?>
                </div>
            </div>
        </div>
        <?php
        break;
        case 'content-rtl':
        if(get_sub_field('enable-background-image')){ ?>
			<div class="row p-2 p-md-4 bg-image" style="background-image:url('<?= get_sub_field('background-image')['url']; ?>');">
		<?php } else { ?>
			<div class="row p-2 p-md-4" style="background-color: <?= $color; ?>;">
		<?php } ?>
            <div class="col-12 col-md-6 col-lg-7 align-self-center">
                <h1 class="text-center text-md-right fjalla-one text-light font-weight-bold"><?php the_sub_field('content-title'); ?></h1>
                <div class="text-center text-md-right">
                    <?php the_sub_field('content'); ?>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-5 align-self-end text-center">
                <img src="<?= get_sub_field('image')['url']; ?>" alt="" class="img-fluid">
            </div>
        </div>
        <?php
        break;
        case 'content-only':
        if(get_sub_field('enable-background-image')){ ?>
			<div class="row bg-image" style="background-image:url('<?= get_sub_field('background-image')['url']; ?>');">
		<?php } else { ?>
			<div class="row" style="background-color: <?= $color; ?>;">
		<?php } ?>
            <div class="col-12 py-4">
                <h1 class="text-center fjalla-one text-light font-weight-bold"><?php the_sub_field('content-title'); ?></h1>
                <div class="text-center text-light">
                    <?php the_sub_field('content'); ?>
                </div>
            </div>
        </div>
        <?php
        break;
    }
    if(get_sub_field('enable-description')){
        ?>
        <div class="row py-2" style="background-color: <?= $color; ?>;">
            <div class="col-12">
                <h3 class="text-light text-center fjalla-one"><?php the_sub_field('description-title'); ?></h3>
            </div>
            <div class="col-12 text-light text-center">
                <?php the_sub_field('description'); ?>
            </div>
        </div>
        <?php
    }
}