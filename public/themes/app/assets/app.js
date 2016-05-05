(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

//require('./partials/_fluid-video.js');

(function ($) {

    console.log('asd');

    // Full screen nav
    // =========================================================================

    var $window = $(window);
    var $siteheader = $('.site-header');
    var headerHeight = $('.site-header').height();

    $('.toggle-full-screen-nav').on('click', function () {
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
            if (currentTop > headerHeight && !$('.site-header').hasClass('site-header--fixed')) {
                $siteheader.addClass('site-header--fixed');
            }
        }

        this.previousTop = currentTop;
    });
})(jQuery);

},{}]},{},[1]);

//# sourceMappingURL=app.js.map
