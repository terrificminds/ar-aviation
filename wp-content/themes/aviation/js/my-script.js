jQuery(document).ready(function ($) {
  $("#partner-home").slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1
  });

  $("body").on("click",".js-readmore a",function(e){
    e.preventDefault();
    var slideParent = $(this).closest('.js-slide');
    var data = $(slideParent).find('.js-partner-modal').html();
    $("#readMoreModal")
      .find(".modal-body").empty().append(data).end()					
      .modal("show");
  }) 

});
