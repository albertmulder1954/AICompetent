<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <div class="content-area">
            <div class="primary">
                <header class="page-header">
                    <h1 class="page-title">
                        <?php
                        if (is_category()) {
                            single_cat_title();
                        } elseif (is_tag()) {
                            single_tag_title();
                        } elseif (is_author()) {
                            the_author();
                        } elseif (is_date()) {
                            if (is_year()) {
                                echo get_the_date('Y');
                            } elseif (is_month()) {
                                echo get_the_date('F Y');
                            } elseif (is_day()) {
                                echo get_the_date();
                            }
                        } else {
                            echo 'Archief';
                        }
                        ?>
                    </h1>
                </header>

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="post">
                            <header class="post-header">
                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="post-meta">
                                    <span>Gepubliceerd op <?php the_date(); ?> door <?php the_author(); ?></span>
                                </div>
                            </header>
                            <div class="post-content">
                                <?php the_excerpt(); ?>
                                <p><a href="<?php the_permalink(); ?>" class="read-more">Lees meer →</a></p>
                            </div>
                        </article>
                    <?php endwhile; ?>

                    <?php
                    // Pagination
                    the_posts_pagination(array(
                        'prev_text' => '← Vorige',
                        'next_text' => 'Volgende →',
                    ));
                    ?>

                <?php else : ?>
                    <article class="post">
                        <div class="post-content">
                            <p>Geen berichten gevonden in dit archief.</p>
                        </div>
                    </article>
                <?php endif; ?>
            </div>
            
            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</main>

<?php get_footer(); ?>