<?php get_header(); ?>

<section class="archive-page">
    <div class="uk-container">
            <h2 class="section-title uk-text-center uk-margin-top"><?php the_archive_title(); ?></h2>

            <div class="archive-grid-container">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="archive-card">
                            <a href="<?php the_permalink(); ?>" class="archive-card-link">
                                <!-- Image and Overlay -->
                                <!-- Post Thumbnail or Default Image -->
                                <div class="archive-card-image">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium_large'); ?>
                                    <?php else : ?>
                                        <img src="https://unsplash.com/photos/_Zua2hyvTBk/download?ixid=M3wxMjA3fDB8MXxhbGx8fHx8fHx8fHwxNzMwOTc3MzUxfA&force=true&w=640" alt="Default article image">
                                    <?php endif; ?>
                                    <div class="overlay"></div>
                                </div>

                                <!-- Title (Initially Visible) -->
                                <div class="archive-card-title">
                                    <h3><?php the_title(); ?></h3>
                                </div>

                                <!-- Excerpt (Initially Hidden) -->
                                <div class="archive-card-excerpt">
                                    <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p><?php esc_html_e('Sorry, no posts found.'); ?></p>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <?php
            // Pagination section
            global $wp_query;

            $big = 999999999; // Need an unlikely integer for pagination base
            $pagination_links = paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('« Prev'),
                'next_text' => __('Next »'),
                'type' => 'array' // Output as an array for custom styling
            ));

            if (!empty($pagination_links)) : ?>
                <div class="pagination-container">
                    <ul class="pagination">
                        <?php foreach ($pagination_links as $link) : ?>
                            <li class="pagination-item"><?php echo $link; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?> 
    </div>
</section>

<?php get_footer(); ?>