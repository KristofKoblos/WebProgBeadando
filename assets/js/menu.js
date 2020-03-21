/* ========= RESIZE ========= */

$('.content').css('margin-top', $('header').height());

$(window).resize(function() {
    $('.content').css('margin-top', $('header').height());
});

/* ========= MOBILE ========= */

$('.mobile-menu-icon').click(function() {
    $('.menu-link').stop().toggleClass('mobile-link');
});

$('.mobile-link').click(function() {
    $('.menu-link').stop().toggleClass('mobile-link');
});

$(document).scroll(function() {
    if($(document).scrollTop() != 0) {
        $('.logo-bar').stop().addClass('scrolled-logo-bar');
    } else {
        $('.logo-bar').stop().removeClass('scrolled-logo-bar');
    }
});

