jQuery(document).ready(function ($) {

  //To Instantiate Patners slider
  $("#partner-home").slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1
  });

  //Sticky Header
  // $(window).scroll(function () {
  //   var sticky = $('.site-header'),
  //     scroll = $(window).scrollTop();

  //   if (scroll >= 120) {
  //     sticky.addClass('fixed');
  //   }
  //   else {
  //     sticky.removeClass('fixed');
  //   }
  // });

  //Hover interaction for news item
  var width = $(window).width();
  if (width > 1025) {
    //desktop interaction
    var toggleOn = false;
    $(".news-block").hover(
      function () {
        $(this).addClass('active');
      }, function () {
        toggleOn || $(this).removeClass('active');
      }
    );
  }
  else {
    // tablet and mobile interaction
    $(".news-block").click(function () {
      $(".news-block").removeClass('active');
      $(this).toggleClass('active');

    });
  }

});
