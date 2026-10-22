<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Convocation Ceremony 2026 - CGC Jhaneri')</title>
    <meta name="description" content="Seventh Convocation Ceremony 2026 at CGC University, Mohali.">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600&family=Playfair+Display:ital,wght@0,500;0,700;1,500&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/convocation-design.css') }}">
</head>
<body>
<div class="induction-page">

    <x-header />
    
    @yield('content')
    <x-footer />
    

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
@stack('scripts')
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/confli.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script>
$(function () {
    AOS.init({ once: true, offset: 60 });

    $(".podium_field").owlCarousel({
        loop: true,
        items: 1,
        margin: 0,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        smartSpeed: 1000,
        touchDrag: true,
        mouseDrag: true
    });
});
</script>
<script>
$(function () {
    AOS.init({ once: true, offset: 60 });

    var header = document.getElementById('header');
    function toggleHeader() {
        header.classList.toggle('header-scrolled', window.scrollY > 40);
    }
    toggleHeader();
    window.addEventListener('scroll', toggleHeader, { passive: true });
});
</script>
</body>
</html>
