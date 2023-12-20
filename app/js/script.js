
$(document).ready(function(){
    $('.slick-custom').slick({
        dots: false,
        infinite: true,
        slidesToShow: 10,
        slidesToScroll: 1,
        lazyLoad: "ondemand",
        speed: 500,
        autoplay: true,
        autoplaySpeed: 3000
      });
  });

$('.navigation li').on('mouseover', function() {
    $('.navigation li.active').removeClass('active');
    $(this).addClass('active');

    $('.tab-pane.active').removeClass('active');
    let id = $(this).find('a').attr('data-href');
    $(id).addClass('active');
});

$('.nav-menu').mouseleave(function() {   
    $('.nav-menu .navigation li.active').removeClass('active');   
    $('.nav-menu .tab-pane.active').removeClass('active');
});

