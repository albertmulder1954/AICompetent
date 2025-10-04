<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <div class="content-area">
            <div class="primary">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post">
                        <header class="post-header">
                            <h1 class="post-title"><?php the_title(); ?></h1>
                            <div class="post-meta">
                                <span>Gepubliceerd op <?php the_date(); ?> door <?php the_author(); ?></span>
                                <?php if (has_category()) : ?>
                                    <span> | Categorie: <?php the_category(', '); ?></span>
                                <?php endif; ?>
                            </div>
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
                        
                        <footer class="post-footer">
                            <?php if (has_tag()) : ?>
                                <div class="post-tags">
                                    <strong>Tags:</strong> <?php the_tags('', ', ', ''); ?>
                                </div>
                            <?php endif; ?>
                        </footer>
                    </article>
                    
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                    
                <?php endwhile; ?>
            </div>
            
            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</main>

<?php get_footer(); ?>