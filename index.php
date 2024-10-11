<?php get_header(); ?>

<section class="dishes">
    <div class="uk-container">
        <h3>All dishes are made with fresh, organic ingredients.</h3>
        <?php if (have_posts()) : while (have_posts()) : the_post() ?>
        <div class="dish">
            <div class="dish-image">
                <?php the_post_thumbnail(); ?>
                <h4><a href=<?php the_permalink() ?>><?php the_title() ?></a></h4>
            </div>
            <div class="dish-content">
                <p><?php the_excerpt(); ?></p>
                <a href=<?php the_permalink(); ?> class="kitchenbee-btn">Read More</a>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>

    </div>
</section>

<!-- </?php get_template_part('/components/homepage-banner'); ?>
</?php get_template_part('/components/featured-dishes'); ?> -->

<?php get_footer(); ?>