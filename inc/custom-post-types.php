<?php
// Add custom post types
function register_knowledge_base_post_type() {
    $args = array(
        'public' => true,
        'label'  => 'Knowledge Base',
        'supports' => array('title', 'editor'),
        'menu_icon' => 'dashicons-welcome-learn-more',
    );
    register_post_type('knowledge_base', $args);
}
add_action('init', 'register_knowledge_base_post_type');

// Add events post types
function register_event_post_type() {
    $labels = array(
        'name'               => 'Events',
        'singular_name'      => 'Event',
        'menu_name'          => 'Events',
        'name_admin_bar'     => 'Event',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Event',
        'new_item'           => 'New Event',
        'edit_item'          => 'Edit Event',
        'view_item'          => 'View Event',
        'all_items'          => 'All Events',
        'search_items'       => 'Search Events',
        'parent_item_colon'  => 'Parent Events:',
        'not_found'          => 'No events found.',
        'not_found_in_trash' => 'No events found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable'  => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'events'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('event', $args);
}
add_action('init', 'register_event_post_type');

// Register Video Post Type
function register_video_post_type() {
    $labels = array(
        'name'               => 'Videos',
        'singular_name'      => 'Video',
        'menu_name'          => 'Videos',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Video',
        'edit_item'          => 'Edit Video',
        'new_item'           => 'New Video',
        'view_item'          => 'View Video',
        'all_items'          => 'All Videos',
        'search_items'       => 'Search Videos',
        'not_found'          => 'No videos found.',
        'not_found_in_trash' => 'No videos found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable'  => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'videos'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-video-alt3', // Suitable Dashicon
        'supports'           => array('title', 'editor', 'thumbnail'),
        'show_in_rest'       => true,
    );

    register_post_type('video', $args);
}
add_action('init', 'register_video_post_type');

// Register Photo Gallery Post Type
function register_photo_gallery_post_type() {
    $labels = array(
        'name'               => 'Photo Galleries',
        'singular_name'      => 'Photo Gallery',
        'menu_name'          => 'Photo Gallery',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Gallery',
        'edit_item'          => 'Edit Gallery',
        'new_item'           => 'New Gallery',
        'view_item'          => 'View Gallery',
        'all_items'          => 'All Galleries',
        'search_items'       => 'Search Galleries',
        'not_found'          => 'No galleries found.',
        'not_found_in_trash' => 'No galleries found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable'  => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'photo-gallery'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-format-gallery', // Suitable Dashicon
        'supports'           => array('title', 'editor', 'thumbnail'),
        'show_in_rest'       => true,
    );

    register_post_type('photo_gallery', $args);
}
add_action('init', 'register_photo_gallery_post_type');

// Add meta box
function add_event_meta_boxes() {
    add_meta_box('event_details', 'Event Details', 'event_details_callback', 'event', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_event_meta_boxes');

// Meta box callback
function event_details_callback($post) {
    $start_date = get_post_meta($post->ID, '_start_date', true);
    $end_date = get_post_meta($post->ID, '_end_date', true);
    $ongoing = get_post_meta($post->ID, '_ongoing', true);
    $featured = get_post_meta($post->ID, '_featured', true);

    ?>
    <p>
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" value="<?php echo esc_attr($start_date); ?>" />
    </p>
    <p>
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" value="<?php echo esc_attr($end_date); ?>" />
    </p>
    <p>
        <label for="ongoing">Ongoing Event:</label>
        <input type="checkbox" id="ongoing" name="ongoing" value="1" <?php checked($ongoing, '1'); ?> />
    </p>
    <p>
        <label for="featured">Featured Event:</label>
        <input type="checkbox" id="featured" name="featured" value="1" <?php checked($featured, '1'); ?> />
    </p>
    <?php
}

// Save meta box data
function save_event_meta_box_data($post_id) {
    if (array_key_exists('start_date', $_POST)) {
        update_post_meta($post_id, '_start_date', $_POST['start_date']);
    }
    if (array_key_exists('end_date', $_POST)) {
        update_post_meta($post_id, '_end_date', $_POST['end_date']);
    }
    if (array_key_exists('ongoing', $_POST)) {
        update_post_meta($post_id, '_ongoing', $_POST['ongoing']);
    } else {
        update_post_meta($post_id, '_ongoing', '0');
    }
    if (array_key_exists('featured', $_POST)) {
        update_post_meta($post_id, '_featured', $_POST['featured']);
    } else {
        update_post_meta($post_id, '_featured', '0');
    }
}
add_action('save_post', 'save_event_meta_box_data');

// Add meta box for video URL
function add_video_meta_box() {
    add_meta_box('video_url', 'Video URL', 'video_meta_box_callback', 'video', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_video_meta_box');

function video_meta_box_callback($post) {
    $video_url = get_post_meta($post->ID, '_video_url', true);
    ?>
    <p>
        <label for="video_url">YouTube or Vimeo URL:</label>
        <input type="url" id="video_url" name="video_url" value="<?php echo esc_attr($video_url); ?>" style="width:100%;" />
    </p>
    <?php
}

// Save video URL
function save_video_url_meta($post_id) {
    if (array_key_exists('video_url', $_POST)) {
        update_post_meta($post_id, '_video_url', sanitize_text_field($_POST['video_url']));
    }
}
add_action('save_post', 'save_video_url_meta');