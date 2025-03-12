<div class="swiper default-carousel swiper-container">
    <div class="swiper-wrapper">
        @foreach ($banner as $row)
        <div class="swiper-slide">
            <div class="rounded-2xl px-4">
                <a href="{{$row->link}}">
                    <img src="{{asset('upload/banner/' . $row->img)}}" class="rounded-2xl" alt="">
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>