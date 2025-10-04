<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <div class="content-area">
            <div class="primary">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="post">
                            <header class="post-header">
                                <h1 class="post-title"><?php the_title(); ?></h1>
                                <div class="post-meta">
                                    <span>Gepubliceerd op <?php the_date(); ?> door <?php the_author(); ?></span>
                                </div>
                            </header>
                            <div class="post-content">
                                <?php the_content(); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <article class="post">
                        <header class="post-header">
                            <h1 class="post-title">Welkom bij de Hamlet Website</h1>
                        </header>
                        <div class="post-content">
                            <p>Welkom op onze uitgebreide website gewijd aan William Shakespeare's meesterwerk "Hamlet". Hier vindt u een diepgaande analyse van dit tijdloze toneelstuk, zijn personages, thema's en de blijvende invloed op de literatuur en cultuur.</p>
                            
                            <div class="hamlet-quote">
                                "To be, or not to be, that is the question"
                            </div>
                            
                            <h2>Over Hamlet</h2>
                            <p>Hamlet, Prins van Denemarken, is een van Shakespeare's meest beroemde en complexe tragedies. Het verhaal volgt de jonge prins Hamlet die wraak zoekt voor de moord op zijn vader door zijn oom Claudius, die nu koning is en getrouwd is met Hamlet's moeder Gertrude.</p>
                            
                            <h2>Belangrijke Thema's</h2>
                            <ul>
                                <li><strong>Wraak:</strong> Het centrale thema van het stuk</li>
                                <li><strong>Waanzin:</strong> Hamlet's gespeelde en mogelijke echte waanzin</li>
                                <li><strong>Moraliteit:</strong> Vragen over goed en kwaad</li>
                                <li><strong>Dood:</strong> De onvermijdelijkheid en betekenis van de dood</li>
                                <li><strong>Betrouwbaarheid:</strong> Het verschil tussen schijn en werkelijkheid</li>
                            </ul>
                            
                            <h2>Hoofdpersonages</h2>
                            <div class="character-card">
                                <div class="character-name">Hamlet</div>
                                <div class="character-description">De Prins van Denemarken, een melancholische en filosofische jongeman die worstelt met wraak en moraliteit.</div>
                            </div>
                            
                            <div class="character-card">
                                <div class="character-name">Claudius</div>
                                <div class="character-description">Hamlet's oom en de nieuwe koning van Denemarken, die zijn broer heeft vermoord om de troon te verkrijgen.</div>
                            </div>
                            
                            <div class="character-card">
                                <div class="character-name">Gertrude</div>
                                <div class="character-description">Hamlet's moeder en de koningin van Denemarken, die snel hertrouwt na de dood van haar eerste echtgenoot.</div>
                            </div>
                            
                            <div class="character-card">
                                <div class="character-name">Ophelia</div>
                                <div class="character-description">Hamlet's geliefde, die tragisch ten onder gaat door de gebeurtenissen in het stuk.</div>
                            </div>
                        </div>
                    </article>
                <?php endif; ?>
            </div>
            
            <aside class="sidebar">
                <div class="widget">
                    <h3 class="widget-title">Beroemde Citaten</h3>
                    <ul>
                        <li>"To be, or not to be, that is the question"</li>
                        <li>"Something is rotten in the state of Denmark"</li>
                        <li>"The lady doth protest too much, methinks"</li>
                        <li>"There are more things in heaven and earth, Horatio, than are dreamt of in your philosophy"</li>
                        <li>"This above all: to thine own self be true"</li>
                    </ul>
                </div>
                
                <div class="widget">
                    <h3 class="widget-title">Acten van het Stuk</h3>
                    <ul>
                        <li><a href="#">Act I: De Geest verschijnt</a></li>
                        <li><a href="#">Act II: Hamlet's Waanzin</a></li>
                        <li><a href="#">Act III: Het Spel binnen het Spel</a></li>
                        <li><a href="#">Act IV: Ophelia's Ondergang</a></li>
                        <li><a href="#">Act V: De Tragische Ontknoping</a></li>
                    </ul>
                </div>
                
                <div class="widget">
                    <h3 class="widget-title">Recente Berichten</h3>
                    <ul>
                        <li><a href="#">De Psychologie van Hamlet</a></li>
                        <li><a href="#">Ophelia's Tragische Verhaal</a></li>
                        <li><a href="#">De Geest van Hamlet's Vader</a></li>
                        <li><a href="#">Hamlet in Moderne Adaptaties</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</main>

<?php get_footer(); ?>