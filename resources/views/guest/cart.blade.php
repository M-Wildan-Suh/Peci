<x-layout.guest>
    <div class=" space-y-8 sm:space-y-16 py-8 sm:py-16 px-4 md:px-8">
        <div class=" w-full max-w-[1080px] mx-auto">
            <div class=" space-y-8">
                <div x-data="{
                        cartItems: [
                            @foreach ($cart as $item)
                                { id: {{ $item->id }}, name: '{{ $item->product->name }}', product_id: '{{ $item->product_id }}', image: '{{ $item->product->image }}', quantity: {{ $item->quantity }}, price: {{ $item->product->price }}, selected: false }, @endforeach
                        ],
                        totalPrice: 0,
                        calculateTotal() {
                            this.totalPrice = this.cartItems.filter(item => item.selected).reduce((total, item) => {
                                return total + item.quantity * item.price;
                            }, 0);
                        },
                        isAnyItemSelected() {
                            return this.cartItems.some(item => item.selected);
                        }
                    }" x-init="calculateTotal()"
                    class="grid grid-cols-1 sm:grid-cols-3 gap-4 md:gap-6">
                    <div class=" sm:col-span-2 space-y-4">
                        <div class=" w-full rounded-md bg-main p-4 space-y-4">
                            <div class=" flex flex-row justify-between">
                                <div class=" flex flex-row gap-2 sm:gap-4 items-center">
                                    <input type="checkbox"
                                        class="rounded-md w-5 h-5 border border-second checked:bg-second checked:focus:bg-second checked:hover:bg-second ring-offset-0 focus:ring-offset-0 focus:ring-0 checked:ring-0 checked:border-second checked:ring-offset-0"
                                        x-model="cartItems.every(item => item.selected)"
                                        @change="cartItems.forEach(item => item.selected = $event.target.checked); calculateTotal()">
                                    <p class=" font-black">Pilih Semua <span
                                            class=" font-normal text-third tracking-wide">({{ $cart->count() }})</span>
                                    </p>
                                </div>
                                {{-- <button class=" font-bold text-second">Hapus</button> --}}
                            </div>
                        </div>
                        <form id="checkout" action="{{ route('checkout') }}" class="space-y-4" method="post">
                            @csrf
                            <input type="text" class=" hidden" x-model="totalPrice" name="subtotal">
                            <template x-for="item in cartItems" :key="item.id">
                                <div class="w-full rounded-md bg-main p-4 space-y-4">
                                    <div class="flex flex-row gap-2 sm:gap-4">
                                        <input 
                                            type="checkbox"
                                            class="rounded-md w-5 h-5 border border-second checked:bg-second checked:focus:bg-second checked:hover:bg-second ring-offset-0 focus:ring-offset-0 focus:ring-0 checked:ring-0 checked:border-second checked:ring-offset-0"
                                            :name="`cartitem[${item.id}]`"
                                            :value="JSON.stringify({ id: item.product_id, quantity: item.quantity })"
                                            x-model="item.selected"
                                            @change="calculateTotal()">
                                        <div class="flex flex-grow gap-4">
                                            <!-- Product Image -->
                                            <div
                                                class="min-w-20 w-20 aspect-square rounded-md bg-white overflow-hidden">
                                                <img :src="'/storage/images/product/' + item.image"
                                                    alt="Product Image" />
                                            </div>

                                            <!-- Product Details -->
                                            <div class="flex flex-col justify-between gap-2 flex-grow">
                                                <div class="w-full flex flex-col md:flex-row justify-between">
                                                    <p class="text-sm sm:text-base line-clamp-1" x-text="item.name"></p>
                                                    <p class="text-sm sm:text-base font-black">Rp<span
                                                            x-text="new Intl.NumberFormat('id-ID').format(item.price)"></span>
                                                    </p>
                                                </div>
                                                <div class="w-full flex items-center gap-4 justify-end">
                                                    <form :action="`{{ route('cart.destroy', '') }}/${item.id}`"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class=" w-5 h-5 text-neutral-600">
                                                            <svg viewBox="0 0 32 32" xml:space="preserve"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M25 10H7v17a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V10zM20 7h-8V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2zM28 10H4V8a1 1 0 0 1 1-1h22a1 1 0 0 1 1 1v2zM16 15v9M12 15v9M20 15v9"
                                                                    fill="none" stroke="currentColor"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-miterlimit="10" stroke-width="2"
                                                                    class="stroke-000000"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                    <div
                                                        class="flex flex-row p-1 rounded-md border border-second gap-1">
                                                        <!-- Button Minus -->
                                                        <div class="flex items-center justify-center w-5 h-5 p-1 rounded-md text-second hover:bg-main cursor-pointer"
                                                            @click="item.quantity = Math.max(item.quantity - 1, 1); calculateTotal()">
                                                            <svg fill="none" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 12h14" stroke="currentColor"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"></path>
                                                            </svg>
                                                        </div>

                                                        <!-- Input Quantity -->
                                                        <input type="text"
                                                            class="w-8 text-center p-0 text-sm border-none bg-transparent focus:ring-0"
                                                            x-model="item.quantity"
                                                            @input="item.quantity = $event.target.value.replace(/[^0-9]/g, '') || ''; calculateTotal()"
                                                            @blur="if (item.quantity === '0' || item.quantity === '') item.quantity = '1'" />

                                                        <!-- Button Plus -->
                                                        <div class="flex items-center justify-center w-5 h-5 p-1 rounded-md text-second hover:bg-main cursor-pointer"
                                                            @click="item.quantity = parseInt(item.quantity) + 1; calculateTotal()">
                                                            <svg fill="none" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 12h7m7 0h-7m0 0V5m0 7v7"
                                                                    stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </form>
                    </div>
                    <div class="w-full">
                        <div class="rounded-md bg-main p-4 space-y-4">
                            <p class="font-bold">RINGKASAN BELANJA</p>
                            <div class="w-full">
                                <div class="w-full flex justify-between">
                                    <p class="text-third">Total Harga</p>
                                    <p class="font-black">Rp<span
                                            x-text="new Intl.NumberFormat('id-ID').format(totalPrice)"></span></p>
                                </div>
                            </div>
                            <div class="w-full h-[0.5px] bg-third rounded-md"></div>
                            <div class="">
                                <input type="text"
                                    class="w-full text-sm font-normal rounded-md border border-second focus:ring-third focus:border-third bg-background"
                                    placeholder="Input kode voucher" />
                            </div>
                            <button onclick="document.getElementById('checkout').submit()"
                                class="w-full py-3 text-sm sm:text-base rounded-md bg-second text-white font-semibold hover:bg-third duration-300"
                                :disabled="!isAnyItemSelected()"
                                :class="{ 'opacity-50 cursor-not-allowed': !isAnyItemSelected() }">
                                Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.guest>
