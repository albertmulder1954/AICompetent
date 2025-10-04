<?php
/**
 * WordPress Bootstrap
 */

// Basic WordPress-like functionality for development
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

// Mock WordPress functions for development
function wp_head() {
    echo '<meta charset="utf-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<title>WordPress Development Site</title>';
    echo '<style>';
    echo 'body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f1f1f1; }';
    echo '.container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }';
    echo '.header { background: #0073aa; color: white; padding: 20px; margin: -20px -20px 20px -20px; border-radius: 8px 8px 0 0; }';
    echo '.nav { margin: 20px 0; }';
    echo '.nav a { margin-right: 20px; color: #0073aa; text-decoration: none; }';
    echo '.nav a:hover { text-decoration: underline; }';
    echo '.post { margin-bottom: 30px; padding-bottom: 20px; border-bottom: 1px solid #eee; }';
    echo '.post-title { color: #333; margin-bottom: 10px; }';
    echo '.post-meta { color: #666; font-size: 0.9em; margin-bottom: 15px; }';
    echo '.post-content { line-height: 1.6; }';
    echo '.sidebar { background: #f9f9f9; padding: 20px; border-radius: 8px; margin-top: 20px; }';
    echo '.widget { margin-bottom: 20px; }';
    echo '.widget-title { color: #333; margin-bottom: 10px; }';
    echo '.footer { background: #333; color: white; padding: 20px; margin: 20px -20px -20px -20px; border-radius: 0 0 8px 8px; text-align: center; }';
    echo '</style>';
}

function wp_footer() {
    echo '<script>';
    echo 'console.log("WordPress Development Environment Active");';
    echo '</script>';
}

function get_header() {
    include 'header.php';
}

function get_footer() {
    include 'footer.php';
}

function bloginfo($show) {
    switch($show) {
        case 'name': echo 'WordPress Development Site'; break;
        case 'description': echo 'Een WordPress development omgeving voor comfortabel coden'; break;
        case 'charset': echo 'utf-8'; break;
        default: echo ''; break;
    }
}

function home_url($path = '') {
    return 'http://localhost:8000' . $path;
}

function wp_title($sep = '|', $display = true, $seplocation = 'right') {
    $title = 'WordPress Development';
    if ($display) {
        echo $title;
    }
    return $title;
}

function body_class($class = '') {
    echo 'class="' . $class . '"';
}

function language_attributes() {
    echo 'lang="nl"';
}

function esc_url($url) {
    return htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
}

function the_title() {
    echo 'Welkom bij WordPress Development';
}

function the_content() {
    echo '<p>Dit is een WordPress development omgeving waar je comfortabel kunt coden. Je kunt hier themes en plugins ontwikkelen.</p>';
    echo '<h3>Beschikbare Development Tools:</h3>';
    echo '<ul>';
    echo '<li>Custom Development Theme</li>';
    echo '<li>Dev Helper Plugin</li>';
    echo '<li>Debug Mode ingeschakeld</li>';
    echo '<li>Development helpers en shortcuts</li>';
    echo '</ul>';
}

function the_excerpt() {
    echo 'Dit is een WordPress development omgeving waar je comfortabel kunt coden...';
}

function the_permalink() {
    echo '#';
}

function the_date() {
    echo date('d-m-Y');
}

function the_author() {
    echo 'Developer';
}

function have_posts() {
    return true;
}

function the_post() {
    // Mock function
}

function wp_nav_menu($args = array()) {
    echo '<ul class="nav">';
    echo '<li><a href="' . home_url() . '">Home</a></li>';
    echo '<li><a href="' . home_url('/about') . '">About</a></li>';
    echo '<li><a href="' . home_url('/contact') . '">Contact</a></li>';
    echo '</ul>';
}

function wp_page_menu($args = array()) {
    wp_nav_menu($args);
}

function wp_get_theme() {
    return new stdClass();
}

function get_template_directory_uri() {
    return home_url('/wp-content/themes/custom-dev-theme');
}

function get_stylesheet_uri() {
    return home_url('/wp-content/themes/custom-dev-theme/style.css');
}

function wp_enqueue_style($handle, $src, $deps = array(), $ver = false, $media = 'all') {
    echo '<link rel="stylesheet" href="' . $src . '">';
}

function wp_enqueue_script($handle, $src, $deps = array(), $ver = false, $in_footer = false) {
    echo '<script src="' . $src . '"></script>';
}

function add_action($hook, $callback, $priority = 10, $accepted_args = 1) {
    // Mock function
}

function add_filter($hook, $callback, $priority = 10, $accepted_args = 1) {
    // Mock function
}

function add_theme_support($feature) {
    // Mock function
}

function register_nav_menus($locations) {
    // Mock function
}

function register_sidebar($args) {
    // Mock function
}

function add_shortcode($tag, $callback) {
    // Mock function
}

function shortcode_atts($pairs, $atts) {
    return array_merge($pairs, $atts);
}

function current_user_can($capability) {
    return true; // For development
}

function is_home() {
    return true;
}

function is_front_page() {
    return true;
}

function WP_DEBUG() {
    return true;
}

// Include theme files
if (file_exists('wp-content/themes/custom-dev-theme/functions.php')) {
    include 'wp-content/themes/custom-dev-theme/functions.php';
}

// Start the page
get_header();
?>
<div class="container">
    <div class="post">
        <h1 class="post-title"><?php the_title(); ?></h1>
        <div class="post-meta">Posted on <?php the_date(); ?> by <?php the_author(); ?></div>
        <div class="post-content">
            <?php the_content(); ?>
        </div>
    </div>
    
    <div class="sidebar">
        <div class="widget">
            <h3 class="widget-title">Development Info</h3>
            <p><strong>WordPress Version:</strong> Development Mode</p>
            <p><strong>Theme:</strong> Custom Dev Theme</p>
            <p><strong>Debug Mode:</strong> Enabled</p>
            <p><strong>Environment:</strong> Local Development</p>
        </div>
        
        <div class="widget">
            <h3 class="widget-title">Quick Links</h3>
            <ul>
                <li><a href="theme-editor.php">Theme Editor</a></li>
                <li><a href="plugin-editor.php">Plugin Editor</a></li>
                <li><a href="debug-log.php">Debug Log</a></li>
            </ul>
        </div>
    </div>
</div>
<?php
get_footer();
?>
