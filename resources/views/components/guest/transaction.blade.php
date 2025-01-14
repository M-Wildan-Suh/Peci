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
    @if ($item->status === 'on ship' || $item->status === 'receive')
        <div class=" w-full items-center flex justify-between gap-4">
            <div class=" flex flex-col">
                <div class=" flex gap-2 items-center text-sm text-third">
                    <p><span class=" text-black">Nomor Resi :</span> {{$item->waybill}}</p>
                    <button class="w-3 h-3" onclick="copyWaybill('{{ $item->waybill }}')">
                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M448 0H224c-35.3 0-64 28.65-64 64v224c0 35.35 28.65 64 64 64h224c35.35 0 64-28.65 64-64V64c0-35.35-28.7-64-64-64zm16 288c0 8.822-7.178 16-16 16H224c-8.8 0-16-7.2-16-16V64c0-8.822 7.178-16 16-16h224c8.822 0 16 7.178 16 16v224zM304 448c0 8.822-7.178 16-16 16H64c-8.822 0-16-7.178-16-16V224c0-8.822 7.178-16 16-16h64v-48H64c-35.35 0-64 28.7-64 64v224c0 35.35 28.65 64 64 64h224c35.35 0 64-28.65 64-64v-64h-48v64z" fill="#currentColor" class="fill-000000"></path>
                        </svg>
                    </button>
                    
                    <script>
                        async function copyWaybill(waybill) {
                            try {
                                await navigator.clipboard.writeText(waybill);
                                alert('Nomor Resi berhasil disalin!');
                            } catch (err) {
                                console.error('Gagal menyalin teks: ', err);
                            }
                        }
                    </script>
                </div>
                <div class=" flex gap-2 items-center text-sm text-third">
                    <p><span class=" text-black">Expedisi :</span> {{$item->service}}</p>
                </div>

            </div>
            <a href="{{ $item->service === 'JNE' ? 'https://jne.co.id/tracking-package' : 
                ($item->service === 'J&T' ? 'https://jet.co.id/track' : 
                ($item->service === 'Si Cepat' ? 'https://sicepat.com/checkAwb' : '#')) }}">
                <button class=" px-2 py-1 text-sm bg-second text-white rounded-md hover:bg-third duration-300">Lacak Paket</button>
            </a>
        </div>
    @endif
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