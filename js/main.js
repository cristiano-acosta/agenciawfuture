var offsetTopNav = $('#main-nav').offset().top;
$('#main-nav').affix({
  offset: {
    top: function () {
      return offsetTopNav;
    }
  }
});
$(window).scroll(function () {
  if ($(document).scrollTop() >= offsetTopNav) {
    $('#main-nav').addClass('scroll_in').css('marginTop', 0);
    $('.nav').addClass('scroll_in').css('marginTop', 2);
    $('.navbar-brand').addClass('scroll_in').css('marginTop', -11);
    // trocando o logo
    $('.hidden_on_scroll').addClass('hidden');
    $('.revel_on_scroll').removeClass('hidden');
  } else if ($(document).scrollTop() <= offsetTopNav) {
    $('#main-nav').removeClass('scroll_in').css('marginTop', 0);
    // trocando o logo
    $('.hidden_on_scroll').removeClass('hidden');
    $('.revel_on_scroll').addClass('hidden');
  }
});
