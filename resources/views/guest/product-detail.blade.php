<x-layout.guest>
    <div class=" sm:space-y-16 sm:py-8 md:py-16 sm:px-4 md:px-8">
        <div class=" w-full max-w-[1080px] mx-auto">
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-8">
                <div class=" w-full md:col-span-4">
                    <div class=" w-full sticky space-y-2 top-24 md:top-32">
                        <div class="swiper mySwiper2 w-full aspect-square sm:rounded-md overflow-hidden">
                            <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                <img src="{{asset('/storage/images/product/'. $product->image)}}" />
                              </div>
                              @foreach ($product->productgallery as $item)    
                                <div class="swiper-slide">
                                    <img src="{{asset('/storage/images/product/gallery/'. $item->image)}}" />
                                </div>
                              @endforeach
                            </div>
                        </div>
                        <div class="swiper mySwiper hidden sm:block">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide border-2 border-transparent rounded-md overflow-hidden">
                                    <img src="{{asset('/storage/images/product/'. $product->image)}}" />
                                </div>
                                @foreach ($product->productgallery as $item)    
                                    <div class="swiper-slide border-2 border-transparent rounded-md overflow-hidden">
                                        <img src="{{asset('/storage/images/product/gallery/'. $item->image)}}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" w-full md:col-span-5 space-y-4 px-4 sm:px-0">
                    <div class=" space-y-1">
                        <p class=" text-2xl font-black">{{$product->name}}</p>
                        <div class=" flex items-center flex-row gap-2">
                            <p>Terjual <span class=" text-neutral-600">12</span></p>
                            <div class=" w-0.5 h-4 rounded-full bg-third"></div>
                            <div class=" flex flex-row items-center">
                                <div class=" w-5 h-5">
                                    <svg baseProfile="tiny" version="1.2" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m9.362 9.158-5.268.584c-.19.023-.358.15-.421.343s0 .394.14.521c1.566 1.429 3.919 3.569 3.919 3.569-.002 0-.646 3.113-1.074 5.19a.496.496 0 0 0 .734.534c1.844-1.048 4.606-2.624 4.606-2.624l4.604 2.625c.168.092.378.09.541-.029a.5.5 0 0 0 .195-.505l-1.071-5.191 3.919-3.566a.499.499 0 0 0-.28-.865c-2.108-.236-5.269-.586-5.269-.586l-2.183-4.83a.499.499 0 0 0-.909 0l-2.183 4.83z" fill="#ffbb00" class="fill-000000"></path></svg>
                                </div>
                                <p>4.7 <span class=" text-neutral-600">(9 rating)</span></p>
                            </div>
                        </div>
                    </div>
                    <p class=" text-3xl font-black">Rp{{ str_replace(',', '.', number_format($product->price))}}</p>
                    <div class=" space-y-1">
                        <div class=" flex items-center flex-row gap-2">
                            <div class=" w-1 h-5 rounded-full bg-black"></div>
                            <p class=" text-xl font-black">Deskripsi</p>
                        </div>
                        <p>{!! nl2br(e($product->description == '' ? 'Description' : $product->description)) !!}</p>
                    </div>
                </div>
                <div class=" w-full sm:col-span-2 md:col-span-3 pb-8 sm:pb-0 px-4 sm:px-0">
                    <div x-data="{ value: 1 }" class=" w-full rounded-md border border-second p-4 space-y-4 sticky top-32">
                        <p class=" font-black">Atur Jumlah Pembelian</p>
                        <div class=" flex items-center flex-row gap-2">
                            <div class=" min-w-12 w-12 h-12 rounded-md overflow-hidden">
                                <img src="{{asset('/storage/images/product/'. $product->image)}}" alt="">
                            </div>
                            <div class=" overflow-hidden">
                                <p class=" line-clamp-1 overflow-hidden">{{$product->name}}</p>
                            </div>
                        </div>
                        <div class=" w-full space-y-4">
                            <div class=" w-full items-center flex flex-row gap-2">
                                <div class="flex flex-row p-1 rounded-md border border-second gap-1">
                                    <!-- Button Minus -->
                                    <div 
                                        class="flex items-center justify-center w-5 h-5 p-1 rounded-md text-second hover:bg-main cursor-pointer" 
                                        @click="value = Math.max(value - 1, 1)">
                                        <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 12h14" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                        </svg>
                                    </div>
                                    <!-- Input -->
                                    <input 
                                        type="text" 
                                        class="w-8 text-center p-0 text-sm border-none bg-transparent focus:ring-0" 
                                        x-model="value" 
                                        @input="value = $event.target.value.replace(/[^0-9]/g, '') || ''" 
                                        @blur="if (value === '0' || value === '') value = '1'" 
                                    />
                                    <!-- Button Plus -->
                                    <div 
                                        class="flex items-center justify-center w-5 h-5 p-1 rounded-md text-second hover:bg-main cursor-pointer" 
                                        @click="value = parseInt(value) + 1">
                                        <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 12h7m7 0h-7m0 0V5m0 7v7" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                        </svg>
                                    </div>
                                </div>                            
                                <p>Stock : <span class=" font-black">204</span></p>
                            </div>
                            <div class=" flex items-center flex-row justify-between">
                                <p class=" text-neutral-600">Subtotal</p>
                                <p class=" text-xl font-black">Rp<span x-text="new Intl.NumberFormat('id-ID', { style: 'decimal' }).format(value * {{$product->price}})"></span></p>
                            </div>
                        </div>
                        <div class=" space-y-2">
                            <form action="{{route('cart.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class=" hidden">
                                    <input type="text" name="new_product" value="{{$product->id}}">
                                    <input type="number" name="quantity" x-model="value" id="">
                                </div>
                                <button class=" w-full p-2 text-center rounded-md text-second border border-second hover:text-third hover:border-third duration-300">+ Keranjang</button>
                            </form>
                            <form action="{{route('checkout')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class=" hidden">
                                    <input type="text" name="one_new" value="{{$product->id}}">
                                    <input type="number" name="quantity" x-model="value" id="">
                                    <input type="number" name="subtotal" x-model="value * {{$product->price}}" id="">
                                </div>
                                <button class=" w-full p-2 text-center rounded-md bg-second text-white hover:bg-third duration-300">Beli</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .mySwiper .swiper-slide-thumb-active {
           border-color: #B17457;
        }
    </style>
    <script>
        window.addEventListener('load', function() {
            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
            });
            var swiper2 = new Swiper(".mySwiper2", {
                thumbs: {
                    swiper: swiper,
                },
            });
        })
    </script>
</x-layout.guest>