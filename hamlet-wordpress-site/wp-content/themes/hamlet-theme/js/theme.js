/**
 * Hamlet Theme JavaScript
 */

(function($) {
    'use strict';

    // Document ready
    $(document).ready(function() {
        
        // Smooth scrolling for anchor links
        $('a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 1000);
                    return false;
                }
            }
        });

        // Add fade-in animation to posts
        $('.post').each(function(index) {
            $(this).css('opacity', '0');
            $(this).delay(index * 200).animate({
                opacity: 1
            }, 800);
        });

        // Mobile menu toggle (if needed)
        $('.menu-toggle').click(function() {
            $('.main-navigation ul').slideToggle();
        });

        // Quote highlighting
        $('.hamlet-quote').hover(
            function() {
                $(this).css('transform', 'scale(1.02)');
            },
            function() {
                $(this).css('transform', 'scale(1)');
            }
        );

        // Character card interactions
        $('.character-card').hover(
            function() {
                $(this).css('box-shadow', '0 4px 15px rgba(0,0,0,0.2)');
            },
            function() {
                $(this).css('box-shadow', '0 2px 5px rgba(0,0,0,0.1)');
            }
        );

        // Add typing effect to site title (optional)
        if ($('.site-title').length) {
            var titleText = $('.site-title').text();
            $('.site-title').text('');
            var i = 0;
            var typeWriter = setInterval(function() {
                if (i < titleText.length) {
                    $('.site-title').text($('.site-title').text() + titleText.charAt(i));
                    i++;
                } else {
                    clearInterval(typeWriter);
                }
            }, 100);
        }

    });

    // Window load
    $(window).on('load', function() {
        // Add loaded class to body
        $('body').addClass('loaded');
    });

    // Scroll events
    $(window).scroll(function() {
        var scrollTop = $(this).scrollTop();
        
        // Header background opacity based on scroll
        if (scrollTop > 100) {
            $('.site-header').css('background', 'rgba(44, 62, 80, 0.95)');
        } else {
            $('.site-header').css('background', 'linear-gradient(135deg, #2c3e50 0%, #34495e 100%)');
        }
    });

})(jQuery);