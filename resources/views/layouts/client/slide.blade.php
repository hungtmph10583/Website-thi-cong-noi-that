@section('page-style')


    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <style>
        .font-detail-custom {
            font-size: 1.4rem;
        }
        
        .sliders {
            padding: 0;
        }
        
        .sliders .slider-container .slide .image {
            width: 100%;
            height: auto;
        }
        
        .sliders .slider-container .slide .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .swiper-pagination-bullet-active {
            background: var(--primary);
        }
        
        .swiper-button-prev::after,
        .swiper-button-next::after {
            font-size: 1.5rem;
        }
        
        /* .swiper-button-prev,
        .swiper-button-next {
            background-color: #3d3b56;
            color: #fff;
            padding: 1rem 1.3rem;
            border-radius: 50%;
        }
        
        .swiper-button-prev:hover,
        .swiper-button-next:hover {
            color: var(--primary);
        } */
    </style>
@endsection

<div class="sliders">
    <div class="swiper slider-container">
        <div class="swiper-wrapper wrapper">
            @foreach($slides as $slide)
            @if($slide->status == 1)
            <div class="swiper-slide slide">
                <div class="image">
                    <img src="{{asset( 'storage/' . $slide->image)}}" alt="{{$slide->alt}}">
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>

@section('page-script')
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    var element = document.getElementById("home");
    element.classList.add("m-menu__item--active");
    var swiper = new Swiper(".slider-container", {
        loop: true,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        speed: 450,
        autoplay: {
            delay: 7000,
        },
    });
</script>
@endsection