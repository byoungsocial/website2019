<?php if (!defined('ABSPATH')) exit;
/* Template name: Contato */
get_header(); ?>

<div class="container-fluid p-0 bg-image bottom-gradient parallax-window" data-parallax="scroll" data-speed="0.5" data-image-src="<?= get_field('top_background')['url']; ?>">
    <div class="container">
        <div class="row" style="min-height:80vh;">
            <div class="col-12 col-lg-8 align-self-end">
                <div class="row">
                    <div class="col-12 col-md-2">
                        <h1 class="display-1 fjalla-one text-pink text-uppercase text-center text-md-left text-shadow"><?php the_field('top_primary_text'); ?></h1>
                    </div>
                    <div class="col-12 col-md-10">
                        <h1 class="fjalla-one text-light text-uppercase text-center text-md-left text-shadow"><?php the_field('top_secondary_text'); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 bg-lightblue">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="row mb-3">
                    <div class="col-12 p-3 bg-white">
                        <h1 class="text-center text-lg-left fjalla-one text-pink text-uppercase"><?php the_field('infobox1_title'); ?></h1>
                        <?php
                        while(have_rows('infobox1_content')){
                            the_row();
                            ?>
                            <p class="mb-0"><?php the_sub_field('text'); ?></p>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 p-3 bg-pink">
                        <h1 class="text-center text-lg-left fjalla-one text-light text-uppercase"><?php the_field('infobox2_title'); ?></h1>
                        <?php
                        while(have_rows('infobox2_content')){
                            the_row();
                            ?>
                            <p class="text-light mb-0"><?php the_sub_field('text'); ?></p>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9 text-center text-md-right">
                <!-- <form action="" method="post">
                    <input type="text" name="nome" id="nome" class="form-control rounded-0 mb-3 p-4" placeholder="Nome" required="required">
                    <input type="email" name="email" id="email" class="form-control rounded-0 mb-3 p-4" placeholder="E-mail" required="required">
                    <input type="text" name="empresa" id="empresa" class="form-control rounded-0 mb-3 p-4" placeholder="Empresa" required="required">
                    <input type="tel" name="telefone" id="telefone" class="form-control rounded-0 mb-3 p-4" placeholder="Telefone" required="required">
                    <select name="potencial" id="potencial" class="form-control rounded-0 mb-3 p-4" required="required">
                        <option value="" selected hidden>Sou um potencial...</option>
                        <option value="cliente">Cliente</option>
                    </select>
                    <textarea name="mensagem" id="mensagem" rows="5" class="form-control rounded-0 mb-3 p-4" placeholder="Mensagem" style="resize:none;"></textarea>
                    <button type="submit" class="btn btn-outline-danger btn-rounded text-uppercase font-weight-bold px-5 py-2">Enviar</button>
                </form> -->
                <?php
                $form = get_field("contact_c7f");
                $formId = $form->ID;
                echo do_shortcode('[contact-form-7 id="'.$formId.'"]');
                ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid p-0 bottom-gradient" id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.26124631719!2d-46.63805183455423!3d-23.59496192380466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce578e20cc64b5%3A0x72102a3a17716a2!2sB-Young+Social+Media+Co.+%7C+Ag%C3%AAncia+de+M%C3%ADdias+Sociais!5e0!3m2!1spt-BR!2sbr!4v1562861488407!5m2!1spt-BR!2sbr" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<?php get_footer(); ?>