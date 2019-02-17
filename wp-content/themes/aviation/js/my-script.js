jQuery(document).ready(function ($) {

  //To Instantiate Patners slider
  $("#partner-home").slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1
  });
    //To Instantiate Services slider
  $("#services-home").slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1
  });

  //to display contents in modal pop up - homepage patners read more link
  $("body").on("click",".js-readmore a",function(e){
    e.preventDefault();
    var slideParent = $(this).closest('.js-slide');
    var data = $(slideParent).find('.js-partner-modal').html();
    $("#readMoreModal")
      .find(".modal-body").empty().append(data).end()					
      .modal("show");
  });

  //Sticky Header
  $(window).scroll(function () {
    var sticky = $('.site-header'),
      scroll = $(window).scrollTop();

    if (scroll >= 120) {
      sticky.addClass('fixed');
    }
    else {
      sticky.removeClass('fixed');
    }
  });

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
  
  //add class to header to add background color for resp header menu
  $("body").on("click","#menu-toggle",function(e){
    var status = $(this).hasClass("toggled-on");
    if(status){
      $("header.site-header").addClass("openMenu");
    }
    else{
      $("header.site-header").removeClass("openMenu");
    }
  }) 

});
