<?php
// Define constant for version number
define('UIKIT_VERSION', '3.21.11');
define('SWIPER_VERSION', '11.1.12');
define('FONTAWESOME_VERSION', '6.6.0');
define('JQUERY_VERSION', '3.7.1');

// Register Menus
function nasMenus() {
    register_nav_menus(
        array (
            'main-menu'  => 'Main Menu',
            'mobile-menu'  => 'Mobile Menu',
        )
     );
}
add_action( 'init', 'nasMenus' );

// Load stylesheets and javascript files
function nasScripts() {
    // UIKit CSS
    wp_enqueue_style( 'uikit-css', get_template_directory_uri(). '/css/uikit.min.css', array(), UIKIT_VERSION );

    // Google Fonts
    wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lora:ital,wght@0,400..700;1,400..700&display=swap' );

    // Swiper CSS
    wp_enqueue_style( 'swiper-css', get_template_directory_uri(). '/css/swiper.min.css', array(), SWIPER_VERSION );

    // Font Awesome CSS
    wp_enqueue_style( 'Font_Awesome', get_template_directory_uri(). '/css/fontawesome.min.css', array(), FONTAWESOME_VERSION );

    // Slick Carousel CSS
    wp_enqueue_style('slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('slick-theme-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');

    wp_enqueue_style('fancybox-css', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css');

    // Main CSS
    wp_enqueue_style( 'main-css', get_template_directory_uri(). '/css/nas.css', array('uikit-css', 'googlefonts'), '1.0.0' );

    // JavaScripts

    wp_enqueue_script( 'jquery', get_template_directory_uri(). '/js/jquery.min.js', array(), JQUERY_VERSION, 'true' );

    // Custom AI Chatbot
    wp_enqueue_script('custom-ai-chatbot-js', get_template_directory_uri() . '/js/custom-ai-chatbot.js', array('jquery'), null, true);
    wp_localize_script('custom-ai-chatbot-js', 'chatbot_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

    wp_enqueue_script( 'swiper-js', get_template_directory_uri(). '/js/swiper.min.js', array(), SWIPER_VERSION, 'true' );

    wp_enqueue_script( 'uikit-js', get_template_directory_uri(). '/js/uikit.min.js', array(), UIKIT_VERSION, 'true' );
    wp_enqueue_script( 'uikit-js-icons', get_template_directory_uri(). '/js/uikit-icons.min.js', array(), UIKIT_VERSION, 'true' );

    wp_enqueue_script( 'fontawesome-js', get_template_directory_uri(). '/js/fontawesome.min.js', array(), FONTAWESOME_VERSION, 'true' );

    wp_enqueue_script('slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);

    wp_enqueue_script('fancybox-js', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array('jquery'), null, true);

    wp_enqueue_script( 'main-js', get_template_directory_uri(). '/js/nas.js', array('jquery'), '1.0.0', 'true' );

}

add_action( 'wp_enqueue_scripts', 'nasScripts' );


// Theme support
include get_theme_file_path( '/inc/theme-support.php' );
include get_theme_file_path( '/inc/custom-post-types.php' );
include get_theme_file_path( '/inc/custom-login.php' );
include get_theme_file_path( '/inc/breadcrumbs.php' );

// Chatbot AJAX request
function process_chatbot_request() {
    if (isset($_POST['user_input']) && !empty($_POST['user_input'])) {
        $user_input = sanitize_text_field($_POST['user_input']);

        // Query the Knowledge Base for relevant information
        $response = search_knowledge_base($user_input);

        echo esc_html($response);
    } else {
        echo 'Invalid input. Please try again.';
    }

    wp_die();
}
add_action('wp_ajax_process_chatbot_request', 'process_chatbot_request');
add_action('wp_ajax_nopriv_process_chatbot_request', 'process_chatbot_request');

function search_knowledge_base($query) {
    // Basic search, can be replaced or enhanced with more sophisticated matching
    $args = array(
        'post_type' => 'knowledge_base',
        'posts_per_page' => 1,
        's' => $query
    );

    $search_query = new WP_Query($args);

    if ($search_query->have_posts()) {
        $search_query->the_post();
        $response = get_the_content();
        wp_reset_postdata();
        return $response;
    } else {
        // Fallback: no direct match found
        return 'I\'m not sure about that. Could you provide more details or try asking differently?';
    }
}

