<?php get_header(); ?>

<section class="event-archive">
   
        <div class="events-archive-container">
            <h1 class="section-title">Our Projects & Events</h1>

            <div class="bento-grid">
                <?php
                $events_query = new WP_Query(array(
                    'post_type' => 'event',
                    'posts_per_page' => -1,
                    'meta_key' => '_start_date',
                    'orderby' => 'meta_value',
                    'order' => 'ASC'
                ));

                if ($events_query->have_posts()) :
                    while ($events_query->have_posts()) : $events_query->the_post(); 
                        $start_date = get_post_meta(get_the_ID(), '_start_date', true);
                        $end_date = get_post_meta(get_the_ID(), '_end_date', true);
                        $ongoing = get_post_meta(get_the_ID(), '_ongoing', true);
                        ?>
                        <div class="bento-item">
                            <a href="<?php the_permalink(); ?>" class="event-link">
                                <div class="event-thumbnail">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large'); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="event-details">
                                    <h3 class="event-title"><?php the_title(); ?></h3>
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
                    <?php endwhile; 
                    wp_reset_postdata();
                else : ?>
                    <p>No upcoming events found.</p>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <?php echo paginate_links(); ?>
            </div>
        </div>
    
</section>

<?php get_footer(); ?>