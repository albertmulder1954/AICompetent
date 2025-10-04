<footer class="site-footer">
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Alle rechten voorbehouden.</p>
        <p>Een website gewijd aan William Shakespeare's meesterwerk "Hamlet"</p>
        <p>
            <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacybeleid</a> | 
            <a href="<?php echo esc_url(home_url('/disclaimer/')); ?>">Disclaimer</a> | 
            <a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a>
        </p>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>