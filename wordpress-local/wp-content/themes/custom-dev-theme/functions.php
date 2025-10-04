<?php
/**
 * Custom Dev Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function custom_dev_theme_setup() {
    // Add theme support for various features
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'custom-dev-theme'),
    ));
}
add_action('after_setup_theme', 'custom_dev_theme_setup');

/**
 * Enqueue scripts and styles
 */
function custom_dev_theme_scripts() {
    wp_enqueue_style('custom-dev-theme-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Add custom JavaScript if needed
    wp_enqueue_script('custom-dev-theme-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'custom_dev_theme_scripts');

/**
 * Register widget areas
 */
function custom_dev_theme_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'custom-dev-theme'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'custom-dev-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'custom_dev_theme_widgets_init');

/**
 * Custom excerpt length
 */
function custom_dev_theme_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'custom_dev_theme_excerpt_length');

/**
 * Custom excerpt more
 */
function custom_dev_theme_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'custom_dev_theme_excerpt_more');

/**
 * Add custom body classes
 */
function custom_dev_theme_body_classes($classes) {
    if (is_home() || is_front_page()) {
        $classes[] = 'home-page';
    }
    return $classes;
}
add_filter('body_class', 'custom_dev_theme_body_classes');

/**
 * Development helper functions
 */
if (WP_DEBUG) {
    // Log function for debugging
    function dev_log($message) {
        if (WP_DEBUG_LOG) {
            error_log('[DEV] ' . print_r($message, true));
        }
    }
    
    // Quick debug function
    function dev_dump($var) {
        echo '<pre style="background: #f1f1f1; padding: 10px; margin: 10px 0; border-left: 4px solid #0073aa;">';
        var_dump($var);
        echo '</pre>';
    }
}