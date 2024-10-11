<?php
// Query for featured events
$featured_events = new WP_Query(array(
    'post_type' => 'event',
    'meta_key' => '_featured',
    'meta_value' => '1'
));

?>

<section class="featured-events">
    <div class="uk-container uk-container-expand">
        <h2 class="uk-text-center">Featured Events</h2>
        <?php
        if ($featured_events->have_posts()) : ?>
            <div class="events-carousel">
                <?php while ($featured_events->have_posts()) : $featured_events->the_post(); ?>
                    <div class="carousel-item">
                        <?php the_post_thumbnail(); ?>
                        <div class="carousel-item-content">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="carousel-item-cta">Read more</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; wp_reset_postdata(); ?>
    </div>
</section>