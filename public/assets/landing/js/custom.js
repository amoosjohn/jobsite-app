$(function() {
    $(".navbar-set li > a").each(function() {
        var href = $(this).attr('href');
        var heading = $(this).text();
        $('.sidenav').append('<a href="' + href + '">' + heading + '</a>');
    });
});



function openNav() {
    document.getElementById("mySidenav").style.left = "0px";
}

function closeNav() {
    document.getElementById("mySidenav").style.left = "-250px";
}


var swiper = new Swiper('.screenshot-slider', {
  slidesPerView: 4,
  spaceBetween: 30,
  centeredSlides: false,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});

new WOW().init();