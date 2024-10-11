<?php

// Query for video posts
$video_posts = new WP_Query(array(
    'post_type' => 'video',
    'posts_per_page' => -1
));

if ($video_posts->have_posts()) : ?>
    <div class="video-grid">
        <?php while ($video_posts->have_posts()) : $video_posts->the_post(); ?>
            <div class="video-item">
                <?php
                $video_url = get_post_meta(get_the_ID(), '_video_url', true);
                if ($video_url) : ?>
                    <a data-fancybox href="<?php echo esc_url($video_url); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php else : ?>
                            <img src="https://img.youtube.com/vi/<?php echo get_video_id($video_url); ?>/hqdefault.jpg" alt="<?php the_title(); ?>" />
                        <?php endif; ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; wp_reset_postdata(); ?>

<?php
// Helper function to extract video ID from YouTube/Vimeo URL
function get_video_id($url) {
    if (strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be') !== false) {
        parse_str(parse_url($url, PHP_URL_QUERY), $query);
        return $query['v'] ?? '';
    } elseif (strpos($url, 'vimeo.com') !== false) {
        return (int) substr(parse_url($url, PHP_URL_PATH), 1);
    }
    return '';
}
?>