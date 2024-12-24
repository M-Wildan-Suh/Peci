<div class=" w-full bg-main backdrop-blur sticky top-0 z-30 px-4 md:px-8 shadow-md shadow-third/20" x-data="{ open : false }">
    <div class=" mx-auto w-full max-w-[1080px] py-2 flex flex-row justify-between items-center relative z-20 bg-main md:bg-transparent">
        <div class=" w-44 h-12">
            <img class=" -ml-2" src="{{ asset('assets/images/logo/logo full.png') }}" alt="">
        </div>
        <div class=" hidden md:block">
            <div class=" flex flex-row gap-4 font-semibold text-third">
                <x-guest.navbutton route="home" active="home">Home</x-guest.navbutton>
                <x-guest.navbutton route="allproduct" :active="['allproduct', 'product.detail']">Product</x-guest.navbutton>
                @auth
                    <x-guest.navbutton route="cart.index" :active="'cart.index'">Cart</x-guest.navbutton>
                    <x-guest.navbutton route="transaction" :active="'transaction'">Transaction</x-guest.navbutton>
                @endauth
            </div>
        </div>
        <div class=" w-44 flex justify-end">
            @if (Route::has('login'))
                <nav class=" flex flex-1 justify-end">
                    @auth
                    <div x-data="{ dropdown: false }" class="flex justify-end items-center text-third relative">
                        <button @click="dropdown = !dropdown" class=" hidden md:flex gap-2 items-center">
                            <div>{{Auth::user()->email}}</div>
                            <div class="w-4 h-4">
                                <svg :class="{'rotate-90': dropdown, 'rotate-0': !dropdown}" class="transition-transform feather feather-chevron-right" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <polyline points="9 18 15 12 9 6"/>
                                </svg>
                            </div>
                        </button>
                    
                        <!-- Floating Dropdown Menu with Slide-down Animation -->
                        <div x-show="dropdown" @click.outside="dropdown = false" 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class=" hidden md:block absolute top-full right-0 mt-2 py-2 w-48 bg-background border rounded shadow-lg text-sm z-50">
                            <a href="{{route('profile.edit')}}" class="block px-4 py-2 text-gray-800 hover:bg-[#E9E4D9]">Profile</a>
                            <form method="POST" class=" w-full" action="{{ route('logout') }}">
                                @csrf
                                <button class="block px-4 py-2 text-gray-800 hover:bg-[#E9E4D9] w-full text-left">Logout</button>
                            </form>
                        </div>
                    </div>
                    
                    @else
                        <a href="{{ route('login') }}" class=" hidden md:flex md:mr-0">
                            <button class=" py-1 md:py-2 px-4 bg-second rounded-md font-semibold text-white hover:bg-third duration-300">Login</button>
                        </a>
                    @endauth
                </nav>
            @endif
            <button @click="open = !open" :class="{'text-third': open, 'text-second': !open}" class=" flex md:hidden gap-2 items-center duration-300">
                <div class=" w-6 h-6">
                    <svg viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 32 32"><path d="M4 10h24a2 2 0 0 0 0-4H4a2 2 0 0 0 0 4zm24 4H4a2 2 0 0 0 0 4h24a2 2 0 0 0 0-4zm0 8H4a2 2 0 0 0 0 4h24a2 2 0 0 0 0-4z" fill="currentColor" class="fill-000000"></path></svg>
                </div>
            </button>
        </div>
    </div>
    <div :class="{'': open, '-translate-y-full': !open}" class=" flex md:hidden flex-col absolute bg-main backdrop-blur w-full left-0 justify-center text-sm gap-4 font-semibold text-third pt-2 px-4 pb-4 duration-300">
        <x-guest.navbutton route="home" active="home">Home</x-guest.navbutton>
        <x-guest.navbutton route="allproduct" :active="['allproduct', 'product.detail']">Product</x-guest.navbutton>
        @auth
            <x-guest.navbutton route="transaction" :active="'transaction'">Cart</x-guest.navbutton>
            <x-guest.navbutton route="transaction" :active="'transaction'">Transaction</x-guest.navbutton>
        @endauth
        @if (Route::has('login'))
            @auth
                <x-guest.navbutton route="profile.edit" :active="''">Profile</x-guest.navbutton>
                <form method="POST" class=" flex w-full" action="{{ route('logout') }}">
                    @csrf
                    <button class=" w-full border-b-2 border-transparent hover:text-black hover:border-black text-wrap text-center duration-300">
                        Logout
                    </a>
                </form>
            @else
                <a href="{{ route('login') }}" class="md:mr-0">
                    <button class=" w-full py-1 md:py-2 px-4 bg-second rounded-md font-semibold text-white hover:bg-third duration-300">Login</button>
                </a>
            @endauth
        @endif
    </div>
</div>
