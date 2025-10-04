<?php
/**
 * Plugin Name: Dev Helper Plugin
 * Description: A helper plugin for WordPress development with useful debugging and development tools
 * Version: 1.0.0
 * Author: Developer
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class DevHelperPlugin {
    
    public function __construct() {
        add_action('init', array($this, 'init'));
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('wp_footer', array($this, 'add_dev_info'));
    }
    
    public function init() {
        // Add development shortcodes
        add_shortcode('dev_info', array($this, 'dev_info_shortcode'));
        add_shortcode('debug_query', array($this, 'debug_query_shortcode'));
    }
    
    public function add_admin_menu() {
        add_management_page(
            'Dev Helper',
            'Dev Helper',
            'manage_options',
            'dev-helper',
            array($this, 'admin_page')
        );
    }
    
    public function admin_page() {
        ?>
        <div class="wrap">
            <h1>Development Helper</h1>
            
            <div class="card">
                <h2>Development Tools</h2>
                <p>This plugin provides various development tools and debugging information.</p>
                
                <h3>Available Shortcodes:</h3>
                <ul>
                    <li><code>[dev_info]</code> - Display WordPress and theme information</li>
                    <li><code>[debug_query]</code> - Display current query information</li>
                </ul>
                
                <h3>Debug Information:</h3>
                <table class="widefat">
                    <tr>
                        <td><strong>WordPress Version:</strong></td>
                        <td><?php echo get_bloginfo('version'); ?></td>
                    </tr>
                    <tr>
                        <td><strong>PHP Version:</strong></td>
                        <td><?php echo PHP_VERSION; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Active Theme:</strong></td>
                        <td><?php echo wp_get_theme()->get('Name'); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Debug Mode:</strong></td>
                        <td><?php echo WP_DEBUG ? 'Enabled' : 'Disabled'; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Memory Limit:</strong></td>
                        <td><?php echo ini_get('memory_limit'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php
    }
    
    public function dev_info_shortcode($atts) {
        if (!WP_DEBUG) {
            return '';
        }
        
        $atts = shortcode_atts(array(
            'show' => 'all'
        ), $atts);
        
        $info = '<div class="dev-info">';
        $info .= '<h3>Development Information</h3>';
        $info .= '<p><strong>WordPress:</strong> ' . get_bloginfo('version') . '</p>';
        $info .= '<p><strong>Theme:</strong> ' . wp_get_theme()->get('Name') . '</p>';
        $info .= '<p><strong>PHP:</strong> ' . PHP_VERSION . '</p>';
        $info .= '<p><strong>Memory:</strong> ' . ini_get('memory_limit') . '</p>';
        $info .= '</div>';
        
        return $info;
    }
    
    public function debug_query_shortcode($atts) {
        if (!WP_DEBUG) {
            return '';
        }
        
        global $wp_query;
        
        $info = '<div class="debug-query">';
        $info .= '<h3>Query Debug Information</h3>';
        $info .= '<p><strong>Query Type:</strong> ' . get_query_var('pagename') ?: 'Home' . '</p>';
        $info .= '<p><strong>Posts Found:</strong> ' . $wp_query->found_posts . '</p>';
        $info .= '<p><strong>Current Page:</strong> ' . get_query_var('paged') ?: '1' . '</p>';
        $info .= '</div>';
        
        return $info;
    }
    
    public function add_dev_info() {
        if (!WP_DEBUG || !current_user_can('manage_options')) {
            return;
        }
        
        echo '<div id="dev-info-bar" style="position: fixed; bottom: 0; left: 0; right: 0; background: #333; color: #fff; padding: 10px; font-size: 12px; z-index: 9999;">';
        echo '<strong>DEV:</strong> ';
        echo 'WP ' . get_bloginfo('version') . ' | ';
        echo 'Theme: ' . wp_get_theme()->get('Name') . ' | ';
        echo 'PHP ' . PHP_VERSION . ' | ';
        echo 'Memory: ' . ini_get('memory_limit');
        echo '</div>';
    }
}

// Initialize the plugin
new DevHelperPlugin();