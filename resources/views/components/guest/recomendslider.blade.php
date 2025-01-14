<div class="recomend w-full overflow-hidden">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper flex">
        @foreach ($product as $item)
            <div class="swiper-slide">
                <a href="{{route('product.detail', ['slug' => $item->slug, 'id' => $item->id])}}" class=" w-full">
                    <div class=" w-full bg-main rounded-md flex justify-between gap-4 p-4 text-third items-center relative">
                        <div class=" w-32 min-w-32 aspect-square flex items-center">
                            <img src="{{asset('storage/images/product/'. $item->image)}}" alt="">
                        </div>
                        <div class=" flex-grow space-y-1">
                            <p class=" text-xl font-bold line-clamp-2">{{$item->name}}</p>
                            <p>Rp{{ str_replace(',', '.', number_format($item->price))}}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
<script>
    window.addEventListener('load', function() {
        const swiper = new Swiper('.recomend', {
            loop: true,
            speed: 800,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            spaceBetween: 16,
            breakpoints: {
                640: {
                slidesPerView: 1,
                },
                768: {
                slidesPerView: 3,
                },
            },
        });
    });
</script>