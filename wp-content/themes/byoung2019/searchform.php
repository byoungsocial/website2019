<?php if (!defined('ABSPATH')) exit; ?>

<form action="<?php echo home_url(); ?>" method="get" id="searchform" role="search" accept-charset="utf-8">
    <div class="input-group input-group-lg">
        <input type="text" name="s" id="s" placeholder="Pesquisar..." class="form-control rounded-0" value="<?php the_search_query(); ?>">
        <div class="input-group-append">
            <button type="submit" class="btn btn-danger rounded-0"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>