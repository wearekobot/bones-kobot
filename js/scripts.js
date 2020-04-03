(function($) {
  // as the page loads, call these scripts
  $(document).ready(function($) {
    $('body').find('.navHamburger').on('click focus', function(event) {
      event.stopPropagation();
      $('body').find('#header').toggleClass('activated');
      $('body').find('.navHamburger').toggleClass('activated');
      $('body').toggleClass('nav-activated');
      $('#content, #footer').on('click', function(e) {
        $('#header').removeClass('activated');
        $('.navHamburger').removeClass('activated');
        $(this).off('click');
      });
    });
  });
})(jQuery);
