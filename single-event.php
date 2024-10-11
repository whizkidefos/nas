<?php get_header(); ?>

<section class="single-event">
    <div class="uk-container">
        <div class="single-event-thumbnail-container">
            <?php the_post_thumbnail(); ?>
            <div class="single-event-category">
                <a href="/events">Events</a>
            </div>
        </div>
        <div class="single-event-content">
            <h1><?php the_title(); ?></h1>
            <p class="event-date"><?php echo get_field('start_date'); ?></p>
            <div class="event-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>