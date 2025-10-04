<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    
    <!-- Preload fonts for better performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <h1 class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <?php bloginfo('name'); ?>
            </a>
        </h1>
        <?php 
        $description = get_bloginfo('description', 'display');
        if ($description || is_customize_preview()) : ?>
            <p class="site-description"><?php echo $description; ?></p>
        <?php endif; ?>
    </div>
</header>

<nav class="main-navigation">
    <div class="container">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_id'        => 'primary-menu',
            'fallback_cb'    => 'hamlet_default_menu',
        ));
        ?>
    </div>
</nav>

<?php
// Fallback menu if no menu is assigned
function hamlet_default_menu() {
    echo '<ul>';
    echo '<li><a href="' . home_url('/') . '">Home</a></li>';
    echo '<li><a href="' . home_url('/over-hamlet/') . '">Over Hamlet</a></li>';
    echo '<li><a href="' . home_url('/personages/') . '">Personages</a></li>';
    echo '<li><a href="' . home_url('/citaten/') . '">Citaten</a></li>';
    echo '<li><a href="' . home_url('/acten/') . '">Acten</a></li>';
    echo '<li><a href="' . home_url('/contact/') . '">Contact</a></li>';
    echo '</ul>';
}
?>