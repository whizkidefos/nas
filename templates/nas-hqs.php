<?php
get_header();

/**
 * Template Name: NAS HQs
 */

?>

<section class="hqs">
    <div class="uk-container">
    <?php if (function_exists('custom_breadcrumbs')) custom_breadcrumbs(); ?>

        <header class="hqs-header">
            <h1><?php the_title(); ?></h1>
            <p class="hqs-countries">
                <span>
                    <?php if ( $countries_in_this_region = get_field( 'countries_in_this_region' ) ) : ?>
                        <?php echo esc_html( $countries_in_this_region ); ?>
                    <?php endif; ?>
                </span>
            </p>
        </header>
        <div class="hqs-content">
            <?php the_content(); ?>
            <h3>Contact details</h3>
            <p class="phone">+234 709 84123 789</p>
            <p class="email">
                <a href="mailto:info@nas-int.org">info@nas-int.org</a>
            </p>
            <p class="address">
                123, XYZ Street, XYZ City, XYZ State, Nigeria
            </p>
            <p class="address">
                123, XYZ Street, XYZ City, XYZ State, South Africa
            </p>
            <h3>Working hours</h3>
            <p>Monday - Friday: 8:00 AM - 5:00 PM</p>
            <p>Saturday: 8:00 AM - 1:00 PM</p>
            <p>Sunday: Closed</p>
        </div>
        <div class="hq-related-posts">
            <h3>Related Posts</h3>
            <?php 
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'orderby' => 'rand',
                'category_name' => 'events',
            );
            ?>
            <?php $hq_posts = new WP_Query($args); ?>
            <?php if($hq_posts->have_posts()): ?>
                <div class="uk-child-width-1-3@m uk-grid-match" uk-grid>
                    <?php while($hq_posts->have_posts()): $hq_posts->the_post(); ?>
                        <div>
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title"><?php the_title(); ?></h3>
                                    <p><?php echo wp_trim_words(get_the_content(), 10); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="uk-button uk-button-text">Read more</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_template_part('components/join-cta'); ?>

<?php get_footer(); ?>