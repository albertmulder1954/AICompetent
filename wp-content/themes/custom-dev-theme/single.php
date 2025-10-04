<?php get_header(); ?>

<div class="container">
    <div class="site-main">
        <?php while (have_posts()) : the_post(); ?>
            <article class="post single-post">
                <h1 class="post-title"><?php the_title(); ?></h1>
                
                <div class="post-meta">
                    <span>Posted on <?php the_date(); ?> by <?php the_author(); ?></span>
                    <?php if (has_category()) : ?>
                        <span> | Categories: <?php the_category(', '); ?></span>
                    <?php endif; ?>
                </div>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
                
                <?php if (has_tag()) : ?>
                    <div class="post-tags">
                        <strong>Tags:</strong> <?php the_tags('', ', ', ''); ?>
                    </div>
                <?php endif; ?>
                
                <div class="post-navigation">
                    <?php
                    the_post_navigation(array(
                        'prev_text' => '&laquo; %title',
                        'next_text' => '%title &raquo;',
                    ));
                    ?>
                </div>
            </article>
            
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
            
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>