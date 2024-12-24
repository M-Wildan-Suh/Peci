@props(['product'])
<div class=" w-full grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
    @foreach ($product as $item)
        <a href="{{route('product.detail', ['slug' => $item->slug, 'id' => $item->id])}}" class=" w-full">
            <div class=" w-full bg-white rounded-md overflow-hidden space-y-2">
                <div class=" w-full aspect-square">
                    <img src="{{asset('storage/images/product/'. $item->image)}}" alt="">
                </div>
                <div class=" pt-0 p-2">
                    <p class=" line-clamp-1">{{$item->name}}</p>
                    <p class=" text-lg font-black">Rp{{ str_replace(',', '.', number_format($item->price))}}</p>
                </div>
            </div>
        </a>
    @endforeach
</div>