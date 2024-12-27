<x-layout.guest>
    <div class=" space-y-8 sm:space-y-16 py-8 sm:py-16 px-4 md:px-8">
        <div class=" w-full max-w-[1080px] mx-auto">
            <div class=" w-full grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class=" w-full pr-8">
                    @include('components.guest.profile-menu')
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
