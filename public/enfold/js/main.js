$(document).ready(function(){

  var actualSlide = 0;
  var totalSlides = $("#carousel .content").length;
  var gap = 100 / totalSlides;
  var lastSlide = $("#carousel .content").length - 1;

  $("#carousel").css("width", (100 * totalSlides) + "%");
  $("#carouselController .button:eq(" + actualSlide + ")").addClass("active");

  var slide = function(){

    if(actualSlide >= totalSlides)
      actualSlide = 0;

    $("#carouselController .button").removeClass("active");
    $("#carouselController .button:eq(" + actualSlide + ")").addClass("active");

    for (var i = 0; i < totalSlides; i++){

      if(actualSlide != totalSlides)
        $("#carousel .content:eq(" + i + ")").css(
          "left", ((gap * actualSlide) * -1) + "%"
        );
      else
      $("#carousel .content:eq(" + i + ")").css(
        "left", "0%"
      );
    }
  }

  $("#carouselController .button").on("click", function(){
    actualSlide = $(this).index();
    slide();
  });

  window.setInterval(function(){
    if(!$("#carouselContainer").is(':hover')){
      actualSlide += 1;
      slide();
    }
  }, 5000);

});
