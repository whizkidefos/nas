<?php get_header(); ?>

<section class="single-post">
    <div class="single-post-container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="post-thumbnail-container">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <!-- Display post category -->
                <div class="post-category">
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" class="category-button">' . esc_html($categories[0]->name) . '</a>';
                    }
                    ?>
                </div>
            </div>

            <h1><?php the_title(); ?></h1>

            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <!-- Post Meta Data -->
            <div class="post-meta">
                <span>Posted on: <?php echo get_the_date(); ?></span> | 
                <span>By: <?php the_author(); ?></span>
            </div>

            <!-- Previous/Next Post Links -->
            <div class="post-navigation">
                <div class="prev-post"><?php previous_post_link(); ?></div>
                <div class="next-post"><?php next_post_link(); ?></div>
            </div>

            <!-- Comments Section -->
            <div class="comments-section">
                <?php comments_template(); ?>
            </div>

        <?php endwhile; else : ?>
            <p>No content found.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>