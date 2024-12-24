<x-layout.guest>
    <div class=" space-y-8 sm:space-y-16 py-8 sm:py-16 px-4 md:px-8">
        <div class=" w-full max-w-[1080px] mx-auto">
            <div class=" w-full grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class=" w-full pr-8">
                    <div class=" space-y-4 pt-4 divide-y divide-main">
                        <div class=" flex gap-4">
                            <div class=" w-14 aspect-square rounded-full bg-red-500"></div>
                            <div class=" flex-col justify-center flex">
                                <p class=" font-bold">Admin</p>
                                <button class=" flex items-center gap-1 text-third">
                                    <div class=" w-3">
                                        <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="currentColor" fill-rule="evenodd" class="fill-000000"></path></svg>
                                    </div>
                                    <p>Edit Profile</p>
                                </button>
                            </div>
                        </div>
                        <div class=" py-6 flex flex-col gap-3">
                            <a href="" class=" flex gap-3 items-center text-third hover:text-second duration-300">
                                <div class=" w-5 aspect-square">
                                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 112c-48.6 0-88 39.4-88 88s39.4 88 88 88 88-39.4 88-88-39.4-88-88-88zm0 128c-22.06 0-40-17.95-40-40 0-22.1 17.9-40 40-40s40 17.94 40 40c0 22.1-17.9 40-40 40zm0-240C114.6 0 0 114.6 0 256s114.6 256 256 256 256-114.6 256-256S397.4 0 256 0zm0 464c-46.73 0-89.76-15.68-124.5-41.79C148.8 389 182.4 368 220.2 368h71.69c37.75 0 71.31 21.01 88.68 54.21C345.8 448.3 302.7 464 256 464zm160.2-75.5c-27-42.2-73-68.5-124.4-68.5h-71.6c-51.36 0-97.35 26.25-124.4 68.48C65.96 352.5 48 306.3 48 256c0-114.7 93.31-208 208-208s208 93.31 208 208c0 50.3-18 96.5-47.8 132.5z" fill="currentColor" class="fill-000000"></path></svg>
                                </div>
                                <p>Profile</p>
                            </a>
                            <a href="{{route('transaction')}}" class=" {{ request()->routeIs('transaction') ? ' text-second' : ' text-third' }} flex gap-3 items-center hover:text-second duration-300">
                                <div class=" w-5 aspect-square">
                                    <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M20 4H4a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1ZM4 2a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h16a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3H4Zm2 5h2v2H6V7Zm5 0a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-3 4H6v2h2v-2Zm2 1a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2h-6a1 1 0 0 1-1-1Zm-2 3H6v2h2v-2Zm2 1a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2h-6a1 1 0 0 1-1-1Z" fill="currentColor" fill-rule="evenodd" class="fill-000000"></path></svg>
                                </div>
                                <p>Transactions</p>
                            </a>
                            <a href="" class=" flex gap-3 items-center text-third hover:text-second duration-300">
                                <div class=" w-5 aspect-square">
                                    <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M20 4H4a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1ZM4 2a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h16a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3H4Zm2 5h2v2H6V7Zm5 0a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-3 4H6v2h2v-2Zm2 1a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2h-6a1 1 0 0 1-1-1Zm-2 3H6v2h2v-2Zm2 1a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2h-6a1 1 0 0 1-1-1Z" fill="currentColor" fill-rule="evenodd" class="fill-000000"></path></svg>
                                </div>
                                <p>Vouchers</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-2 w-full space-y-4" x-data="{ activeModal: 'semua' }">
                    <!-- Tabs -->
                    <div class="bg-main rounded-t-md w-full grid grid-cols-5">
                        <button @click="activeModal = 'semua'"
                            :class="activeModal === 'semua' ? 'text-second border-second' :
                                'text-third hover:text-second border-transparent'"
                            class="py-3 font-bold duration-300 border-b-2">
                            Semua
                        </button>
                        <button @click="activeModal = 'dibayar'"
                            :class="activeModal === 'dibayar' ? 'text-second border-second' :
                                'text-third hover:text-second border-transparent'"
                            class="py-3 font-bold duration-300 border-b-2">
                            Dibayar
                        </button>
                        <button @click="activeModal = 'dikirim'"
                            :class="activeModal === 'dikirim' ? 'text-second border-second' :
                                'text-third hover:text-second border-transparent'"
                            class="py-3 font-bold duration-300 border-b-2">
                            Dikirim
                        </button>
                        <button @click="activeModal = 'diterima'"
                            :class="activeModal === 'diterima' ? 'text-second border-second' :
                                'text-third hover:text-second border-transparent'"
                            class="py-3 font-bold duration-300 border-b-2">
                            Diterima
                        </button>
                        <button @click="activeModal = 'selesai'"
                            :class="activeModal === 'selesai' ? 'text-second border-second' :
                                'text-third hover:text-second border-transparent'"
                            class="py-3 font-bold duration-300 border-b-2">
                            Selesai
                        </button>
                    </div>

                    <!-- Modal Content -->
                    <div x-show="activeModal === 'semua'" class=" flex flex-col gap-4">
                        @foreach ($data as $item)
                            @include('components.guest.transaction')
                        @endforeach
                    </div>
                    <div x-show="activeModal === 'dibayar'" class="space-y-4">
                        @foreach ($data->filter(fn($item) => $item->status === 'on going') as $item)
                            @include('components.guest.transaction')
                        @endforeach
                    </div>
                    <div x-show="activeModal === 'dikirim'" class="space-y-4">
                        @foreach ($data->filter(fn($item) => $item->status === 'on ship') as $item)
                            @include('components.guest.transaction')
                        @endforeach
                    </div>
                    <div x-show="activeModal === 'diterima'" class="space-y-4">
                        @foreach ($data->filter(fn($item) => $item->status === 'receive') as $item)
                            @include('components.guest.transaction')
                        @endforeach
                    </div>
                    <div x-show="activeModal === 'selesai'" class="space-y-4">
                        @foreach ($data->filter(fn($item) => $item->status === 'success') as $item)
                            @include('components.guest.transaction')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.guest>
