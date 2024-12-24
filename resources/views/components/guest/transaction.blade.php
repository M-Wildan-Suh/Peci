<div class="w-full bg-main p-4 rounded-md space-y-4">
    <div class="flex flex-wrap gap-2">
        <p class=" font-bold">Belanja</p>
        <p>11 Nov 2024</p>

        <div class=" text-xs bg-second text-white rounded-md py-1 px-2">
            {{ 
                $item->status === 'on going' ? 'Belum dibayar' : (
                $item->status === 'on ship' ? 'Pengiriman' : (
                $item->status === 'receive' ? 'Diterima' : (
                $item->status === 'success' ? 'Selesai' : 'Belum dibayar'
                ))) 
            }}
        </div>
        <p class=" text-third">{{$item->transaction_code}}</p>
    </div>
    <div class=" space-y-4">
        @foreach ($item->transactionitem as $tritem)
            <div class=" flex flex-row gap-4">
                <div
                    class=" min-w-12 w-12 max-h-12 sm:min-w-14 sm:w-14 sm:max-h-14 aspect-square rounded-md overflow-hidden">
                    <img src="{{ asset('/storage/images/product/' . $tritem->product->image) }}"
                        alt="">
                </div>
                <div class=" flex flex-col flex-grow">
                    <p class=" text-sm sm:text-base font-bold line-clamp-1">
                        {{ $tritem->product->name }}</p>
                    {{-- <p class=" text-sm sm:text-base text-third">Tipe</p> --}}
                    <p class=" text-sm text-third">
                        {{ $tritem->quantity }} x
                        Rp{{ str_replace(',', '.', number_format($tritem->product->price)) }}
                    </p>
                </div>
                <div class=" min-w-20 flex flex-col justify-center items-center">
                    <p class=" text-center text-sm text-third">Total Belanja</p>
                    <p class=" text-sm font-black"> Rp{{ str_replace(',', '.', number_format($tritem->product->price*$tritem->quantity)) }}</p>
                </div>
            </div>
        @endforeach
    <div class=" flex justify-end gap-2 items-center">
        <p class=" font-black">Subtotal :</p>
        <p class=" text-2xl font-black text-second">Rp{{ str_replace(',', '.', number_format($item->subtotal)) }}</p>
    </div>
    </div>
    <div class=" flex justify-end gap-4">
        @if ($item->status === 'on going') 
            <button class=" px-3 py-2 text-sm font-black rounded-md bg-second text-white hover:bg-third duration-300">Cancel</button>
            <form action="{{route('payment')}}" method="POST">
                @csrf
                <div class=" hidden">
                    <input type="text" name="id" value="{{$item->id}}">
                </div>
                <button class=" px-3 py-2 text-sm font-black rounded-md bg-second text-white hover:bg-third duration-300">Lanjutkan Pembayaran</button>
            </form>
        @elseif ($item->status === 'on ship') 
            <button disabled class=" px-3 py-2 text-sm font-black rounded-md bg-second text-white hover:bg-third duration-300 cursor-not-allowed opacity-50">Pesanan Selesai</button>
        @elseif ($item->status === 'receive') 
            <form action="{{route('receive')}}" method="POST">
                @csrf
                <div class=" hidden">
                    <input type="text" name="id" value="{{$item->id}}">
                </div>
                <button class=" px-3 py-2 text-sm font-black rounded-md bg-second text-white hover:bg-third duration-300">Pesanan Selesai</button>
            </form>
        @elseif ($item->status === 'success') 
            <div class=" px-3 py-2 text-sm font-black rounded-md bg-second text-white hover:bg-third duration-300 cursor-not-allowed">Beli Lagi</div>
        @else 
            <div class=" px-3 py-2 text-sm font-black rounded-md bg-second text-white hover:bg-third duration-300">Lanjutkan Pembayaran</div>
        @endif
    </div>
</div>