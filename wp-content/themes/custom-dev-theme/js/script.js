/**
 * Custom Dev Theme JavaScript
 */

(function($) {
    'use strict';
    
    $(document).ready(function() {
        console.log('Custom Dev Theme loaded');
        
        // Add smooth scrolling for anchor links
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
        
        // Mobile menu toggle (if needed)
        $('.menu-toggle').click(function() {
            $('.main-navigation').toggleClass('active');
        });
        
        // Add development helpers
        if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
            console.log('Development mode active');
            
            // Add development info to console
            console.log('WordPress Development Environment');
            console.log('Theme: Custom Dev Theme');
            console.log('WordPress Version: ' + (typeof wp !== 'undefined' ? wp.version : 'Unknown'));
        }
    });
    
})(jQuery);