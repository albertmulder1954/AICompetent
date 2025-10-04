<?php
/**
 * Hamlet Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function hamlet_theme_setup() {
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
        'primary' => __('Primary Menu', 'hamlet-theme'),
    ));
    
    // Set content width
    if (!isset($content_width)) {
        $content_width = 800;
    }
}
add_action('after_setup_theme', 'hamlet_theme_setup');

/**
 * Enqueue scripts and styles
 */
function hamlet_theme_scripts() {
    wp_enqueue_style('hamlet-theme-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Add Google Fonts
    wp_enqueue_style('hamlet-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lora:wght@400;600&display=swap', array(), null);
    
    wp_enqueue_script('hamlet-theme-script', get_template_directory_uri() . '/js/theme.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'hamlet_theme_scripts');

/**
 * Register widget areas
 */
function hamlet_theme_widgets_init() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'hamlet-theme'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'hamlet-theme'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'hamlet_theme_widgets_init');

/**
 * Custom excerpt length
 */
function hamlet_custom_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'hamlet_custom_excerpt_length');

/**
 * Custom excerpt more
 */
function hamlet_custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'hamlet_custom_excerpt_more');

/**
 * Add custom body classes
 */
function hamlet_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    return $classes;
}
add_filter('body_class', 'hamlet_body_classes');

/**
 * Customize the login page
 */
function hamlet_login_logo() {
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_template_directory_uri(); ?>/images/hamlet-logo.png);
            height: 65px;
            width: 320px;
            background-size: 320px 65px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
    <?php
}
add_action('login_enqueue_scripts', 'hamlet_login_logo');

/**
 * Change login logo URL
 */
function hamlet_login_logo_url() {
    return home_url();
}
add_filter('login_headerurl', 'hamlet_login_logo_url');

/**
 * Change login logo title
 */
function hamlet_login_logo_url_title() {
    return 'Hamlet Website';
}
add_filter('login_headertitle', 'hamlet_login_logo_url_title');

/**
 * Add Hamlet-specific content to admin dashboard
 */
function hamlet_admin_dashboard_widget() {
    wp_add_dashboard_widget(
        'hamlet_dashboard_widget',
        'Hamlet Website Info',
        'hamlet_dashboard_widget_content'
    );
}
add_action('wp_dashboard_setup', 'hamlet_admin_dashboard_widget');

function hamlet_dashboard_widget_content() {
    echo '<p>Welkom bij uw Hamlet website! Hier zijn enkele handige links:</p>';
    echo '<ul>';
    echo '<li><a href="' . admin_url('post-new.php') . '">Nieuw bericht schrijven</a></li>';
    echo '<li><a href="' . admin_url('edit.php?post_type=page') . '">Pagina\'s beheren</a></li>';
    echo '<li><a href="' . admin_url('themes.php') . '">Thema\'s</a></li>';
    echo '<li><a href="' . admin_url('customize.php') . '">Aanpassen</a></li>';
    echo '</ul>';
    echo '<p><strong>Tip:</strong> Voeg regelmatig nieuwe content toe over Hamlet om uw website actueel te houden!</p>';
}

/**
 * Custom post types for Hamlet content
 */
function hamlet_custom_post_types() {
    // Characters post type
    register_post_type('hamlet_character', array(
        'labels' => array(
            'name' => 'Personages',
            'singular_name' => 'Personage',
            'add_new' => 'Nieuw Personage',
            'add_new_item' => 'Nieuw Personage Toevoegen',
            'edit_item' => 'Personage Bewerken',
            'new_item' => 'Nieuw Personage',
            'view_item' => 'Personage Bekijken',
            'search_items' => 'Personages Zoeken',
            'not_found' => 'Geen personages gevonden',
            'not_found_in_trash' => 'Geen personages gevonden in prullenbak'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-groups',
        'rewrite' => array('slug' => 'personages'),
    ));
    
    // Quotes post type
    register_post_type('hamlet_quote', array(
        'labels' => array(
            'name' => 'Citaten',
            'singular_name' => 'Citaat',
            'add_new' => 'Nieuw Citaat',
            'add_new_item' => 'Nieuw Citaat Toevoegen',
            'edit_item' => 'Citaat Bewerken',
            'new_item' => 'Nieuw Citaat',
            'view_item' => 'Citaat Bekijken',
            'search_items' => 'Citaten Zoeken',
            'not_found' => 'Geen citaten gevonden',
            'not_found_in_trash' => 'Geen citaten gevonden in prullenbak'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-format-quote',
        'rewrite' => array('slug' => 'citaten'),
    ));
}
add_action('init', 'hamlet_custom_post_types');

/**
 * Flush rewrite rules on theme activation
 */
function hamlet_theme_activation() {
    hamlet_custom_post_types();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'hamlet_theme_activation');
?>