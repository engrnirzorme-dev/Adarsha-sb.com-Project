$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
    items: 4,
    itemsDesktop:[1000,3],
    itemsDesktopSmall:[979,2],
    itemsTablet:[768, 2],
    itemsMobile:[650, 1],
    nav:true,
    pagination: true,
    autoPlay: true,
  });
    $("#date-widget-slider").owlCarousel({
    items: 1,
    itemsDesktop:[1000,1],
    itemsDesktopSmall:[979,1],
    itemsTablet:[768, 1],
    itemsMobile:[650, 1],
    nav:true,
    pagination: true,
    autoPlay: true,
  });
});
