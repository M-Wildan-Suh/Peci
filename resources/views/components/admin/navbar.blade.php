<div class="w-full min-h-screen flex flex-row" x-data="{ open: true }">
    <div :class="open ? 'min-w-20 w-20 lg:min-w-72 lg:w-72' : 'min-w-20 w-20'"
        class=" hidden sm:block bg-main space-y-6 transition-all duration-300 overflow-x-hidden sticky top-0 h-screen">
        <div class="w-full h-20 p-4 flex items-center gap-3">
            <div class="aspect-square h-full">
                <img src="{{ asset('assets/images/banner.png') }}" alt="">
            </div>
            <p class="font-bold text-lg duration-300 line-clamp-1" :class="open ? 'opacity-0 lg:opacity-100' : 'opacity-0'">Web Peci
            </p>
        </div>
        <div class="pl-4 space-y-4">
            <x-admin.navbutton route="dashboard" :active="'dashboard'">
                <div class="min-w-6 h-6">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z"
                            fill="currentColor" class="fill-000000"></path>
                    </svg>
                </div>
                <p class=" line-clamp-1 duration-300" :class="open ? 'opacity-0 lg:opacity-100' : 'opacity-0'">Dashboard
                </p>
            </x-admin.navbutton>
            <x-admin.navbutton route="user.index" :active="'user.index'">
                <div class="min-w-6 h-6">
                    <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" d="M0 0h256v256H0z"></path>
                        <path
                            d="M231.9 212a120.7 120.7 0 0 0-67.1-54.2 72 72 0 1 0-73.6 0A120.7 120.7 0 0 0 24.1 212a7.7 7.7 0 0 0 0 8 7.8 7.8 0 0 0 6.9 4h194a7.8 7.8 0 0 0 6.9-4 7.7 7.7 0 0 0 0-8Z"
                            fill="currentColor" class="fill-000000"></path>
                    </svg>
                </div>
                <p class=" line-clamp-1 duration-300" :class="open ? 'opacity-0 lg:opacity-100' : 'opacity-0'">User</p>
            </x-admin.navbutton>
            <x-admin.navbutton route="product.index" :active="['product.index', 'product.create', 'product.show']">
                <div class="min-w-6 h-6">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M2 3h20v4H2zm17 5H3v11a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8h-2zm-3 6H8v-2h8v2z" fill="currentColor" class="fill-000000"></path></svg>
                </div>
                <p class=" line-clamp-1 duration-300" :class="open ? 'opacity-0 lg:opacity-100' : 'opacity-0'">Product</p>
            </x-admin.navbutton>
            <x-admin.navbutton route="transaction.index" :active="['transaction.index', 'transaction.create', 'transaction.show']">
                <div class="min-w-6 h-6">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M22 6h-7a6 6 0 1 0 0 12h7v2a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v2zm-7 2h8v8h-8a4 4 0 1 1 0-8zm0 3v2h3v-2h-3z" fill="currentColor" class="fill-000000"></path></svg>
                </div>
                <p class=" line-clamp-1 duration-300" :class="open ? 'opacity-0 lg:opacity-100' : 'opacity-0'">Transaction</p>
            </x-admin.navbutton>
        </div>
    </div>
    <div class="flex flex-col w-full sm:w-auto flex-grow">
        {{-- Header Desktop --}}
        <div class=" hidden sm:flex w-full bg-main py-6 pl-12 pr-12 lg:pr-32 duration-300 sticky top-0 z-30">
            <div class="w-full mx-auto flex justify-between">
                <div class="flex gap-4 items-center">
                    <button id="openclose" class=" w-0 lg:w-6 aspect-square duration-300" @click="open = !open">
                        <svg class="duration-300" :class="open ? 'rotate-90' : ''" viewBox="0 0 32 32"
                            xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 32 32">
                            <path
                                d="M4 10h24a2 2 0 0 0 0-4H4a2 2 0 0 0 0 4zm24 4H4a2 2 0 0 0 0 4h24a2 2 0 0 0 0-4zm0 8H4a2 2 0 0 0 0 4h24a2 2 0 0 0 0-4z"
                                fill="currentColor" class="fill-000000"></path>
                        </svg>
                    </button>
                    <div class="text-2xl font-bold">{{ $title ?? '' }}</div>
                </div>
                <div x-data="{ open: false }" class="flex justify-end items-center text-neutral-600 relative">
                    <button @click="open = !open" class="flex gap-2 items-center">
                        <div>{{ Auth::user()->email }}</div>
                        <div class="w-4 h-4">
                            <svg :class="{ 'rotate-90': open, 'rotate-0': !open }"
                                class="transition-transform feather feather-chevron-right" fill="none"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <polyline points="9 18 15 12 9 6" />
                            </svg>
                        </div>
                    </button>

                    <!-- Floating Dropdown Menu with Slide-down Animation -->
                    <div x-show="open" @click.outside="open = false"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute top-full right-0 mt-2 py-2 w-48 bg-main border rounded shadow-lg text-sm z-50">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a>
                        <form method="POST" class=" w-full" action="{{ route('logout') }}">
                            @csrf
                            <button
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200 w-full text-left">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Header Mobile --}}
        <div class=" flex flex-col sm:hidden w-full px-4 pt-3 pb-2 bg-main sticky top-0 z-20 shadow-md shadow-third/20">
            <p class=" text-2xl font-black text-center">Web Peci</p>
        </div>
        <div class="sm:pl-12 sm:pr-12 lg:pr-32 duration-300 pt-4 sm:pt-8 pb-20 sm:pb-8 px-4">
            <div class=" flex sm:hidden w-full rounded-md bg-main py-2 px-4 mb-4">
                <p class=" text-lg font-black">{{$title}}</p>
            </div>
            {{ $slot }}
            @include('components.admin.mobile-navbar')
        </div>
    </div>
</div>
