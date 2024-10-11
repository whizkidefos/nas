<?php
// Query for photo gallery posts
$gallery_posts = new WP_Query(array(
    'post_type' => 'photo_gallery',
    'posts_per_page' => -1
));

if ($gallery_posts->have_posts()) : ?>
    <div class="bento-grid">
        <?php while ($gallery_posts->have_posts()) : $gallery_posts->the_post(); ?>
            <div class="bento-item">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>" class="lightbox">
                        <?php the_post_thumbnail('large'); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; wp_reset_postdata(); ?>
