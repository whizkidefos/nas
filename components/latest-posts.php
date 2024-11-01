<section class="latest-posts">

    <div class="uk-container">
        <div class="bento-grid-container">
            <h2 class="section-title uk-text-center">Press Releases</h2>

            <div class="bento-grid">
                <?php
                $latest_posts = new WP_Query(array(
                    'posts_per_page' => 6
                ));

                if ($latest_posts->have_posts()) :
                    while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                        <div class="bento-item">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php endif; ?>
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>No posts found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section>