<?php if (!defined('ABSPATH')) exit; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="<?php the_field('theme_color', 'option'); ?>">
    <link rel="stylesheet" href="<?php location(); ?>/css/main.css">
    <script type="text/javascript">
        ajaxUrl = "<?= admin_url(); ?>/admin-ajax.php";
    </script>
    <?php wp_head(); ?>
</head>
<body>

<div class="d-none d-md-block" id="social-desktop">
    <ul class="list-unstyled pr-5">
        <?php
        while(have_rows('header_social', 'option')){
            the_row();
            ?>
            <li class="mb-3"><a href="<?php the_sub_field('link'); ?>" target="_blank" class="text-light"><?php the_sub_field('icon', 'option'); ?></a></li>
            <?php
        }
        ?>
    </ul>
</div>

<div class="d-block d-md-none" id="social-mobile">
    <ul class="list-inline text-center">
        <?php
        while(have_rows('header_social', 'option')){
            the_row();
            ?>
            <li class="list-inline-item mx-3"><a href="<?php the_sub_field('link'); ?>" target="_blank" class="text-light h3"><?php the_sub_field('icon', 'option'); ?></a></li>
            <?php
        }
        ?>
    </ul>
</div>

<header class="container-fluid py-3 py-lg-5">
    <div class="row">
        <div class="col-6 col-md-12 text-left text-md-center">
            <a href="<?php bloginfo('url'); ?>">
                <img src="<?= get_field('header_logo', 'option')['sizes']['medium']; ?>" alt="site-logo" class="img-fluid">
            </a>
        </div>
        <div class="col-6 col-md-12 text-right text-md-center mt-0 mt-md-3">
            <button class="hamburger hamburger--slider px-0 transparent" type="button" id="menu-toggle">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="row expandable-menu mt-4">
        <div class="col-12">
            <ul class="list-unstyled text-right text-lg-left">
                <?php
                $menu = get_menu_items('primary');
                foreach($menu as $item){
                    $icon = get_field('menu_icon', $item->ID);
                    ?>
                    <li class="text-right text-md-center mb-4 pt-2"><a href="<?= $item->url; ?>" class="text-light" style="text-decoration:none!important;"><span class="h4"><?= $icon; ?></span><br><span class="text-uppercase" style="font-size:10px;"><?= $item->title; ?></span></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <!--<div class="row hide-on-menu d-none d-lg-block">
        <div class="col-12">
            <p class="text-light lettering text-vertical">Contato - Tenha seu time exclusivo</p>
        </div>
    </div>-->
</header>
