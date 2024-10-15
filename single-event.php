<?php get_header();
$start_date = get_post_meta(get_the_ID(), '_start_date', true);
$end_date = get_post_meta(get_the_ID(), '_end_date', true);
$ongoing = get_post_meta(get_the_ID(), '_ongoing', true);
?>

<section class="single-event">
    <div class="uk-container">
    <?php if (function_exists('custom_breadcrumbs')) custom_breadcrumbs(); ?>

        <div class="single-event-thumbnail-container">
            <?php the_post_thumbnail(); ?>
            <div class="single-event-category">
                <a href="/events">Events</a>
            </div>
            <div class="event-dates">
                <small>
                    Start date: 
                    <?php echo date("F j, Y", strtotime($start_date)); ?>
                </small>
                 - 
                <small>
                    End date: 
                    <?php if (!$ongoing && $end_date) : ?>
                        - <?php echo date("F j, Y", strtotime($end_date)); ?>
                    <?php elseif ($ongoing) : ?>
                        (Ongoing)
                    <?php endif; ?>
                </small>
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