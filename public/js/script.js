$(document).ready(function() {
    $(".item-rankings_carousel").owlCarousel({
        autoplayTimeout: 2500, // time for slides changes
        smartSpeed: 1500, // duration of change of 1 slide
        nav: false,
        autoplay: true,
        loop: true,
        dots: true,
        pagination: false,
        autoHeight: false,
        touchDrag: false,
        mouseDrag: false,
        autoplayHoverPause:true,
        margin: 0,
        responsive:{
        0:{
            items: 2,
        },
        600:{
            items: 4,
            margin: 20
        }
        }
    });
});

$(document).ready(function() {
    $(".student-key-features_owl").owlCarousel({
        items: 4,
        autoplayTimeout: 2500,
        smartSpeed: 1500,
        nav: false,
        autoplay: true,
        loop: true,
        dots: true,
        pagination: false,
        autoHeight: false,
        touchDrag: false,
        mouseDrag: false,
        autoplayHoverPause: true,
        margin: 20, 
        responsive: {
            0: {
                items: 1,
                margin: 20
            },
            600: {
                items: 1,
                margin: 20
            },
            1200: {
                items: 4,
                margin: 20
            }
        }
    });
});
document.addEventListener('DOMContentLoaded', (event) => {
    window.addEventListener('scroll', function() {
        const header = document.getElementById('header');
        if (window.scrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
});

