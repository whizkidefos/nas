<?php get_header(); ?>

<section class="archive-page">
    <div class="uk-container">
            <div class="bento-grid-container">
            <h2 class="section-title"><?php the_archive_title(); ?></h2>

            <div class="bento-grid">
                <?php if (have_posts()) :
                    while (have_posts()) : the_post(); ?>
                        <div class="bento-item">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php endif; ?>
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </div>
                    <?php endwhile;
                else : ?>
                    <p>No posts found.</p>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <?php echo paginate_links(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>