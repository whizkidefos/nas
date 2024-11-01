<?php get_header(); ?>

<header class="default-page-header">
    <div class="uk-container">
        <h1><?php the_title(); ?></h1>
    </div>
</header>

<section class="default-page-content">
    <div class="uk-container">
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer(); ?>