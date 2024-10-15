<?php
// Query for featured events
$featured_events = new WP_Query(array(
    'post_type' => 'event',
    'meta_key'  => '_featured',
    'meta_value' => '1',
    'posts_per_page' => -1
));
?>
    
    <?php if ($featured_events->have_posts()) : ?>
        
        <section class="featured-events-section">
            <div class="uk-container">
                <h2>Featured Event</h2>
                    <div class="swiper events-container">
                        <div class="swiper-wrapper events-wrapper">
                            <?php while ($featured_events->have_posts()) : $featured_events->the_post(); 
                                $start_date = get_post_meta(get_the_ID(), '_start_date', true);
                                $end_date = get_post_meta(get_the_ID(), '_end_date', true);
                                $ongoing = get_post_meta(get_the_ID(), '_ongoing', true);
                            ?>
                                <div class="swiper-slide event-slide">
                                    <a href="<?php the_permalink(); ?>" class="event-link">
                                        <div class="event-thumbnail">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('large'); ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="event-details">
                                            <h3 class="event-title"><?php the_title(); ?></h3>
                                            <small><?php the_excerpt(); ?></small>
                                            <p class="event-date">
                                                <?php echo date("F j, Y", strtotime($start_date)); ?>
                                                <?php if (!$ongoing && $end_date) : ?>
                                                    - <?php echo date("F j, Y", strtotime($end_date)); ?>
                                                <?php elseif ($ongoing) : ?>
                                                    (Ongoing)
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
        
                        <!-- Add Pagination and Navigation Controls -->
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"><i class="fa-solid fa-chevron-right"></i></div>
                        <div class="swiper-button-prev"><i class="fa-solid fa-chevron-left"></i></div>
                    </div>
                
            </div>
        </section>
    <?php endif; ?>

<?php wp_reset_postdata(); ?>