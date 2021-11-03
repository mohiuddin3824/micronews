
$( document ).ready(function() {
    $('ul.nav li.dropdown').hover(function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });

    $(window).scroll(function () {
      if ($(this).scrollTop() > $('.site_header').height()) {
          $('.header_menu').addClass("sticky_nav");
      } else {
          $('.header_menu').removeClass("sticky_nav");
      }
  });

  $(window).scroll(function () {
    if ($(this).scrollTop() > $('.site_header').height()) {
        $('.bottom_footer').addClass("fixed_footer");
    } else {
        $('.bottom_footer').removeClass("fixed_footer");
    }
  });

    $(window).scroll(function() {
      if ($(this).scrollTop()>250)
      {
          $('.scroll-top-wrapper').fadeIn();
      }
      else
      {
      $('.scroll-top-wrapper').fadeOut();
      }
  });

  $('.scroll-top-wrapper').bind("click", function () {
      $('html, body').animate({ scrollTop: 0 }, 1200);
      
  });

});


  