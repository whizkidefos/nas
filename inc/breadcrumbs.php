<?php

function custom_breadcrumbs() {
    // Settings
    $separator = ' > '; // Breadcrumb separator
    $home_title = 'Home'; // Text for the "Home" link

    // Get the query & post information
    global $post, $wp_query;

    // Build the breadcrumb structure
    echo '<div class="breadcrumbs">';
    
    // Home page link
    echo '<a href="' . get_home_url() . '">' . $home_title . '</a>' . $separator;

    if (is_home() || is_front_page()) {
        // For the home page, just display the title
        echo 'Home';
    } elseif (is_single()) {
        // For single posts, display the category (if applicable) and post title
        $category = get_the_category();
        if (!empty($category)) {
            $last_category = end($category);
            echo '<a href="' . get_category_link($last_category->term_id) . '">' . $last_category->name . '</a>' . $separator;
        }
        echo '<span>' . get_the_title() . '</span>';
    } elseif (is_category()) {
        // For category archive pages, display the category name
        echo '<span>' . single_cat_title('', false) . '</span>';
    } elseif (is_page()) {
        // For static pages, display parent pages (if any) and the current page title
        if ($post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                array_unshift($breadcrumbs, '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>' . $separator);
                $parent_id = $page->post_parent;
            }
            foreach ($breadcrumbs as $breadcrumb) {
                echo $breadcrumb;
            }
        }
        echo '<span>' . get_the_title() . '</span>';
    } elseif (is_archive()) {
        // For archive pages, display the archive title
        echo '<span>' . post_type_archive_title('', false) . '</span>';
    } elseif (is_search()) {
        // For search result pages, display the search query
        echo '<span>Search results for: ' . get_search_query() . '</span>';
    } elseif (is_404()) {
        // For 404 error pages, display "404"
        echo '<span>404 - Page not found</span>';
    }

    echo '</div>';
}

// Add breadcrumbs before the content
function add_breadcrumbs_before_content($content) {
    if (!is_front_page()) {  // Exclude breadcrumbs on the homepage
        $breadcrumbs = '<div class="breadcrumbs-wrapper">';
        $breadcrumbs .= custom_breadcrumbs();  // Generate breadcrumbs
        $breadcrumbs .= '</div>';
        return $breadcrumbs . $content;  // Append the breadcrumbs to the content
    }
    return $content;
}
add_filter('the_content', 'add_breadcrumbs_before_content');