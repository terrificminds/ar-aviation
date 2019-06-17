jQuery(document).ready(function ($) {

  //remove height and width of custom logo
  $('.custom-logo').removeAttr('width').removeAttr('height');

  //To Instantiate Patners slider-homepage
  $("#partner-home").slick({
    dots: true,
    infinite: true,
    autoplay: true, 
    autoplaySpeed: 4000,
    slidesToShow: 1,
    slidesToScroll: 1
  });

  $("#patnerslogo-home").slick({
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 4000,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
          breakpoint: 991,
          settings: {
            slidesToShow: 3
          }
      },
      {
          breakpoint: 768,
          settings: {
            slidesToShow: 2
          }
      },
      {
          breakpoint: 600,
          settings: {
            slidesToShow: 1
          }
      }

  ]
  });
    //To Instantiate Services slider-homepage
  $("#services-home").slick({
    dots: true,
    infinite: true,
    autoplay: true, 
    autoplaySpeed: 4000,
    slidesToShow: 1,
    slidesToScroll: 1
  });
  //To Instantiate Service page sliders
  $(".slider-servicepage").slick({
    dots: true,
    infinite: true,
    autoplay: true, 
    autoplaySpeed: 4000,
    slidesToShow: 1,
    slidesToScroll: 1
  });
  //news page lazy loading plugin
  $('.loadMore').loadMoreResults({
          displayedItems: 8
  });

     //show/hide loadmore button - news and events page
     var noOfNews = $(".news-content").attr("data-count");
     if (noOfNews <= 8) {
       $(".new-container .btn-load-more").addClass('hide');
     }
    
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
    
    $(".service-slider").hover(
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
    $(".service-slider").click(function () {
      $(".service-slider").removeClass('active');
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
 
    // Add minus icon for collapse element which is open by default
    $(".collapse.in").each(function(){
      $(this).siblings(".panel-heading").find(".glyphicon").addClass("glyphicon-minus").removeClass("glyphicon-plus");
    });
    
    // Toggle plus minus icon on show hide of collapse element
    $(".collapse").on('show.bs.collapse', function(){
      $(this).parent().find(".glyphicon").removeClass("glyphicon-plus").addClass("glyphicon-minus");
    }).on('hide.bs.collapse', function(){
      $(this).parent().find(".glyphicon").removeClass("glyphicon-minus").addClass("glyphicon-plus");
    });
 
 //Contact form Floating label transition
  $('input').focus(function(){
    $(this).parents('.form-group').addClass('focused');
  });

  $('input').blur(function(){
    var inputValue = $(this).val();
    if ( inputValue == "" ) {
      $(this).removeClass('filled');
      $(this).parents('.form-group').removeClass('focused');  
    } else {
      $(this).addClass('filled');
    }
  }); 

});
