(($) ->
  # as the page loads, call these scripts
  $(document).ready( ($) ->
    $('body').find('.navHamburger').on 'click focus', (event) ->
      event.stopPropagation()
      $('body').find('#header').toggleClass('activated')
      $('body').find('.navHamburger').toggleClass('activated')
      $('body').toggleClass('nav-activated')
      $('#content, #footer').on 'click', (e) ->
       $('#header').removeClass('activated')
       $('.navHamburger').removeClass('activated')
       $(this).off 'click'
  )
)(jQuery)
