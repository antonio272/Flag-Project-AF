
$(document).ready(function() {

    $('.one-time').slick({
        dots: true,
        /*infinite: true,*/
        speed: 300,
        arrows: false,
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        adaptiveHeight: true,
        
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              }
            }
        ],
    });
});