//require('./partials/_fluid-video.js');

(function ($) {

    console.log('asd');

    // Full screen nav
    // =========================================================================

    var $window      = $(window);
    var $siteheader  = $('.site-header');
    var headerHeight = $('.site-header').height();

    $('.toggle-full-screen-nav').on('click', function() {
        $('.nav-icon').toggleClass('nav-icon--active');
        $('.full-screen-nav').toggleClass('full-screen-nav--active');
        $('.site-header').toggleClass('site-header--nav-visible');
        $('body').toggleClass('no-scrolling');
    });

    $window.on('scroll', { previousTop: 0 }, function () {
        var currentTop = $window.scrollTop();

        // If user is going up or down
        if (currentTop < this.previousTop) {
            // If going up...
            if (currentTop > 0 && $siteheader.hasClass('site-header--fixed')) {
                $siteheader.addClass('site-header--visible');
                console.log('show');
            } else {
                $siteheader.removeClass('site-header--visible site-header--fixed');
            }
        } else {
            // If going down...
            $siteheader.removeClass('site-header--visible');
            if( currentTop > headerHeight && !$('.site-header').hasClass('site-header--fixed')) {
                $siteheader.addClass('site-header--fixed');
            }
        }

        this.previousTop = currentTop;
    });

})(jQuery);
