<?php get_header(); ?>

<div class="container">
    <div class="site-main">
        <?php while (have_posts()) : the_post(); ?>
            <article class="post page">
                <h1 class="post-title"><?php the_title(); ?></h1>
                
                <div class="post-content">
                    <?php the_content(); ?>
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