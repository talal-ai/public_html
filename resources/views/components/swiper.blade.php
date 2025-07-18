@extends('Layout.layout')

@section('css')

<!-- Swiper Css -->
<link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}" />


@endsection

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Components</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z" fill="currentColor" />
                    </svg>
                </li>
                <li>Swiper</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Basic Swiper</h2>
            <div class="swiper SwiperDefault">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-1.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-2.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-3.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-4.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Basic Carousel With Arrow</h2>
            <div class="swiper SwiperwithArrows">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-6.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-7.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-5.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-4.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-2.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                </div>
                <div class="swiper-button-next text-white"></div>
                <div class="swiper-button-prev text-white"></div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Basic Carousel With Pagination</h2>
            <div class="swiper SwiperwithPagination">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-5.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-7.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-3.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-4.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-2.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Basic Carousel With Progress</h2>
            <div class="swiper SwiperwithProgress">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-6.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-7.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-5.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-4.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-2.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                </div>
                <div class="swiper-button-next text-white"></div>
                <div class="swiper-button-prev text-white"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Basic Carousel With Multiple Slides</h2>
            <div class="swiper SwiperMultiple">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-6.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-7.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-5.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-4.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                    <div class="swiper-slide"><img src="{{ asset('assets/images/images-2.jpg') }}" alt="slider" class="max-h-96 w-full object-cover" /></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

    <!-- Swiper Slider Js -->
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>


<script>
    var swiper = new Swiper(".SwiperDefault", {});
    var swiper = new Swiper(".SwiperwithArrows", {
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var swiper = new Swiper(".SwiperwithPagination", {
        pagination: {
            el: ".swiper-pagination",
        },
    });
    var swiper = new Swiper(".SwiperwithProgress", {
        pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var swiper = new Swiper(".SwiperMultiple", {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 30
            }
        }
    });
</script>

@endsection