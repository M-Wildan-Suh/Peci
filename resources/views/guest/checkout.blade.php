<x-layout.guest>
    <div class=" space-y-8 sm:space-y-16 py-8 sm:py-16 px-4 md:px-8">
        <div class=" w-full max-w-[1080px] mx-auto">
            <div class=" space-y-8">
                <div class=" grid grid-cols-1 sm:grid-cols-3 gap-4 md:gap-6">
                    <div class=" sm:col-span-2 space-y-4">
                        <div class=" w-full rounded-md bg-main p-4 space-y-4">
                            <p class=" font-bold text-third">ALAMAT PENGIRIMAN</p>
                            <div class="">
                                <div class=" flex flex-row items-center gap-1">
                                    <div class=" w-4 h-4 text-second">
                                        <svg viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                            enable-background="new 0 0 24 24">
                                            <path
                                                d="M12 0C7 0 3 4 3 9c0 6.2 3.4 11.7 8.5 14.9.3.2.7.2 1.1 0 5-3.3 8.4-8.7 8.4-14.9 0-5-4-9-9-9zm0 13c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"
                                                fill="currentColor" class="fill-000000"></path>
                                        </svg>
                                    </div>
                                    <p class=" font-black">{{$mainaddress->name}} • 0{{$mainaddress->phone_number}}</p>
                                </div>
                                <p class=" line-clamp-2">{{$mainaddress->address}}, ({{$mainaddress->additional}})</p>
                            </div>
                            <div x-data="{ open: {{ session('open', false) ? 'true' : 'false' }},  add: false }" class="w-auto">
                                <!-- Button to open the modal -->
                                <button @click="open = true"
                                    class="text-sm px-3 py-1 rounded-md border text-second border-second hover:bg-background duration-300">
                                    Ganti Alamat
                                </button>

                                @include('admin.address.index')
                            </div>
                        </div>
                        <div class=" w-full rounded-md bg-main p-4 space-y-4">
                            <p class=" font-bold">PRODUCT</p>
                            <div class=" space-y-4">
                                @foreach ($data->transactionitem as $item)
                                    <div class=" flex flex-row gap-4">
                                        <div
                                            class=" min-w-16 w-16 max-h-16 sm:min-w-20 sm:w-20 sm:max-h-20 aspect-square rounded-md overflow-hidden">
                                            <img src="{{ asset('/storage/images/product/' . $item->product->image) }}"
                                                alt="">
                                        </div>
                                        <div class=" flex flex-col gap-2">
                                            <p class=" text-sm sm:text-base line-clamp-2 text-third">
                                                {{ $item->product->name }}</p>
                                            {{-- <p class=" text-sm sm:text-base text-third">Tipe</p> --}}
                                            <p class=" text-sm sm:text-base font-black">Price : {{ $item->quantity }} x
                                                Rp{{ str_replace(',', '.', number_format($item->product->price)) }}</<
                                                    /p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class=" sm:col-span-1">
                        <div class=" w-full rounded-md bg-main p-4 space-y-4">
                            <p class=" font-bold">RINGKASAN BELANJA</p>
                            <div class=" w-full">
                                <div class=" w-full flex justify-between">
                                    <p class=" text-third">Total Harga ({{ $data->transactionitem->count() }} Barang)
                                    </p>
                                    <p class=" font-black">
                                        Rp{{ str_replace(',', '.', number_format($data->subtotal)) }}</p>
                                </div>
                                {{-- <div class=" w-full flex justify-between">
                                    <p class=" text-third">Diskon Voucher</p>
                                    <p class=" font-black text-third">-Rp1.000</p>
                                </div> --}}
                            </div>
                            <div class=" w-full h-[0.5px] bg-third rounded-md"></div>
                            <div class=" w-full flex font-black justify-between">
                                <p class="">Total Belanja</p>
                                <p class="">Rp{{ str_replace(',', '.', number_format($data->subtotal)) }}</< /p>
                            </div>
                            <div class=" w-full h-[0.5px] bg-third rounded-md"></div>
                            <div class="">
                                <input type="text"
                                    class=" w-full text-sm font-normal rounded-md border border-second focus:ring-third focus:border-third bg-background"
                                    placeholder="Input kode voucher" name="" id="">
                            </div>
                            <div class="">
                                <form action="{{route('payment')}}" method="POST">
                                    @csrf
                                    <div class=" hidden">
                                        <input type="text" name="id" value="{{$data->id}}">
                                    </div>
                                    <button
                                        class=" w-full py-3 text-sm sm:text-base rounded-md bg-second text-white font-semibold hover:bg-third duration-300">Pembayaran</button>
                                </form>
                            </div>
                            <p class=" text-sm text-center text-third">
                                Dengan melanjutkan, kamu menyetujui S&K Asuransi & Proteksi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.guest>
