<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <div class="content-area">
            <div class="primary">
                <article class="post">
                    <header class="post-header">
                        <h1 class="post-title">404 - Pagina Niet Gevonden</h1>
                    </header>
                    <div class="post-content">
                        <div class="hamlet-quote">
                            "Something is rotten in the state of Denmark"
                        </div>
                        
                        <p>Helaas kunnen we de pagina die u zoekt niet vinden. Het lijkt erop dat deze pagina niet bestaat of is verplaatst.</p>
                        
                        <h2>Wat kunt u doen?</h2>
                        <ul>
                            <li><strong>Controleer de URL:</strong> Zorg ervoor dat de webadres correct is gespeld</li>
                            <li><strong>Ga terug:</strong> Gebruik de terug-knop van uw browser</li>
                            <li><strong>Start opnieuw:</strong> Ga naar de <a href="<?php echo home_url(); ?>">homepage</a></li>
                            <li><strong>Zoek:</strong> Gebruik de zoekfunctie om te vinden wat u zoekt</li>
                        </ul>
                        
                        <h2>Populaire Pagina's</h2>
                        <ul>
                            <li><a href="<?php echo home_url('/over-hamlet/'); ?>">Over Hamlet</a></li>
                            <li><a href="<?php echo home_url('/personages/'); ?>">Personages</a></li>
                            <li><a href="<?php echo home_url('/citaten/'); ?>">Beroemde Citaten</a></li>
                            <li><a href="<?php echo home_url('/acten/'); ?>">Acten van het Stuk</a></li>
                        </ul>
                        
                        <h2>Zoek op de Site</h2>
                        <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                            <label>
                                <span class="screen-reader-text">Zoeken naar:</span>
                                <input type="search" class="search-field" placeholder="Zoeken..." value="<?php echo get_search_query(); ?>" name="s" />
                            </label>
                            <input type="submit" class="search-submit" value="Zoeken" />
                        </form>
                        
                        <p><em>Of misschien was dit een teken dat u meer tijd moet besteden aan het lezen van Shakespeare's meesterwerk?</em></p>
                    </div>
                </article>
            </div>
            
            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</main>

<?php get_footer(); ?>