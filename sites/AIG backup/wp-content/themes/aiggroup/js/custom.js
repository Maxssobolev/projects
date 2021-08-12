(function ($) {
  var nav = $('.mobile_header');
  $(window).scroll(function (event) {
    if ($(window).width() <= 575) {
      if ($(this).scrollTop() > 136) {
        nav.addClass('fixed-top');
      } else {
        nav.removeClass('fixed-top');
      }
    }
  });
})(jQuery);
