<?php get_header(); ?>

<section class="single-post">
    <div class="uk-container">
        <div class="uk-child-width-expand@s" uk-grid>
            <div class="uk-width-2-3@m">
                <div>
                    <div class="single-post-container">
                        <?php if (function_exists('custom_breadcrumbs')) custom_breadcrumbs(); ?>
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

                            <?php get_template_part('components/social-share'); ?>

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
                </div>
            </div>
            <div class="uk-width-1-3@m">
                <div>
                    <!-- Sidebar starts here -->
                    <aside class="sidebar">
                        <!-- Section for Recent Posts -->
                        <div class="recent-posts">
                            <h2>Recent Posts</h2>
                            <ul>
                                <?php
                                // Query for recent posts excluding the current post
                                $recent_posts = new WP_Query(array(
                                    'posts_per_page' => 6,
                                    'post__not_in'   => array(get_the_ID()), // Exclude current post
                                    'ignore_sticky_posts' => 1
                                ));

                                if ($recent_posts->have_posts()) :
                                    while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                                        <li>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <div class="thumbnail">
                                                        <?php the_post_thumbnail('thumbnail'); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <span><?php the_title(); ?></span>
                                            </a>
                                        </li>
                                    <?php endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                            </ul>
                        </div>

                        <!-- Section for Category List -->
                        <div class="category-list">
                            <h2>Categories</h2>
                            <ul>
                                <?php 
                                // Get list of categories
                                $categories = get_categories();
                                foreach ($categories as $category) {
                                    echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        
    </div>
</section>

<?php get_footer(); ?>