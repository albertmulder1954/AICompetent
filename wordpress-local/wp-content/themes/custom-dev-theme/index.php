<?php get_header(); ?>

<div class="container">
    <div class="site-main">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="post">
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    
                    <div class="post-meta">
                        <span>Posted on <?php the_date(); ?> by <?php the_author(); ?></span>
                    </div>
                    
                    <div class="post-content">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                </article>
            <?php endwhile; ?>
            
            <div class="pagination">
                <?php
                the_posts_pagination(array(
                    'prev_text' => '&laquo; Previous',
                    'next_text' => 'Next &raquo;',
                ));
                ?>
            </div>
            
        <?php else : ?>
            <div class="no-posts">
                <h2>No posts found</h2>
                <p>Sorry, no posts were found.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>