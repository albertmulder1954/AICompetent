<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <div class="content-area">
            <div class="primary">
                <header class="page-header">
                    <h1 class="page-title">
                        Zoekresultaten voor: "<?php echo get_search_query(); ?>"
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
                                    <?php if (get_post_type() == 'post') : ?>
                                        <span> | Categorie: <?php the_category(', '); ?></span>
                                    <?php endif; ?>
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
                            <p>Geen resultaten gevonden voor "<?php echo get_search_query(); ?>".</p>
                            <p>Probeer andere zoektermen of gebruik de navigatie om door de site te bladeren.</p>
                            
                            <h3>Suggesties:</h3>
                            <ul>
                                <li>Controleer de spelling van uw zoektermen</li>
                                <li>Probeer meer algemene zoektermen</li>
                                <li>Probeer minder specifieke zoektermen</li>
                                <li>Gebruik synoniemen</li>
                            </ul>
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