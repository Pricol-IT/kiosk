<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Document</title>
</head>
<style>
    .bg-c-blue {
        /* background: linear-gradient(45deg, #4099ff, #73b4ff); */
    }

    body {

        background: url('{{asset('assets/img/image.jpg')}}');
        background-attachment: fixed;
        background-size: cover;
        background-repeat: no-repeat;
        ba height: 80vh;
    }

    a {
        text-decoration: none;
    }

    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .autoplay-progress {
        position: absolute;
        right: 16px;
        bottom: 16px;
        z-index: 10;
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: var(--swiper-theme-color);
    }

    .autoplay-progress svg {
        --progress: 0;
        position: absolute;
        left: 0;
        top: 0px;
        z-index: 10;
        width: 100%;
        height: 100%;
        stroke-width: 4px;
        stroke: var(--swiper-theme-color);
        fill: none;
        stroke-dashoffset: calc(125.6 * (1 - var(--progress)));
        stroke-dasharray: 125.6;
        transform: rotate(-90deg);
    }

</style>
<body>
    <div class="container ">
        <div class="row mt-5 pt-5">
            <div class="col-lg-10">
                <div class="row">
                    @foreach ($links as $link)
                    <div class="col-lg-4 p-2">
                        <a href="{{$link->link_url}}" onclick="window.open(this.href, '_blank', 'width=1700,height=900'); return false;" class="link">
                            <div class="card  p-2 h-100 shadow d-flex flex-column ">
                                <div class="card-body text-center flex-fill">
                                    <h2 class="text-primary">{{ucfirst($link->title)}}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach</div>
            </div>

        </div>
    </div>
    <div class="swiper mySwiper" id="slider">
        <div class="swiper-wrapper">
            @foreach ($images as $image)
            <div class="swiper-slide"><img src="{{$image->image_url}}" alt=""></div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
        <div class="autoplay-progress">
            <svg viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20"></circle>
            </svg>
            <span></span>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        $(document).ready(function() {
            var inactivityTimeout = 180000; // 3 minutes in milliseconds
            var sliderTimeout;

            function showSlider() {
                $("#slider").fadeIn();
                $(".container").hide();
            }

            function resetTimeout() {
                clearTimeout(sliderTimeout);
                $(".container").show();
                $("#slider").hide();
                sliderTimeout = setTimeout(showSlider, inactivityTimeout);
            }

            $(document).on("mousemove keydown", resetTimeout);

            resetTimeout();
        });
        const progressCircle = document.querySelector(".autoplay-progress svg");
        const progressContent = document.querySelector(".autoplay-progress span");
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30
            , centeredSlides: true
            , autoplay: {
                delay: 2500
                , disableOnInteraction: false
            }
            , pagination: {
                el: ".swiper-pagination"
                , clickable: true
            }
            , navigation: {
                nextEl: ".swiper-button-next"
                , prevEl: ".swiper-button-prev"
            }
            , on: {
                autoplayTimeLeft(s, time, progress) {
                    progressCircle.style.setProperty("--progress", 1 - progress);
                    progressContent.textContent = `${Math.ceil(time / 1000)}s`;
                }
            }
        });

        $(document).ready(function() {
            var inactivityTimeout = 180000; // 3 minutes in milliseconds
            var sliderTimeout;

            // Function to show the slider
            function showSlider() {
                $("#slider").fadeIn();
            }

            // Reset the inactivity timeout and hide the slider
            function resetTimeout() {
                clearTimeout(sliderTimeout);
                sliderTimeout = setTimeout(showSlider, inactivityTimeout);
            }

            // Attach event listeners to reset the timeout on user activity
            $(document).on("mousemove keydown", resetTimeout);

            // Initial setup
            resetTimeout();
        });

    </script>

</body>
</html>
