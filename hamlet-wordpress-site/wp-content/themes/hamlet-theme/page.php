<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <div class="content-area">
            <div class="primary">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post">
                        <header class="post-header">
                            <h1 class="post-title"><?php the_title(); ?></h1>
                        </header>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <?php the_content(); ?>
                            
                            <?php
                            wp_link_pages(array(
                                'before' => '<div class="page-links">',
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</main>

<?php get_footer(); ?>