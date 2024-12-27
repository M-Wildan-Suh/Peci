<x-layout.guest>
    <div class=" space-y-8 sm:space-y-16 py-8 sm:py-16 px-4 md:px-8">
        <div class=" w-full max-w-[1080px] mx-auto">
            <div class=" w-full grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class=" w-full pr-8">
                    @include('components.guest.profile-menu')
                </div>
                <div x-data="{  add: false }" class="md:col-span-2 w-full space-y-4" x-data="{ activeModal: 'semua' }">
                    <div class=" w-full p-4 bg-main rounded-md space-y-6">
                        <div class=" w-full">
                            <button @click="add = true"
                                class=" w-full py-2 bg-second hover:bg-third duration-300 font-black rounded-md text-white">Add
                                Address</button>
                            @include('admin.address.create')
                        </div>
                        <div class=" w-full space-y-2">
                            @foreach ($data as $item)
                                <div class=" w-full rounded-md border {{ $item->active ? 'bg-second/20' : '' }} border-second p-4">
                                    <p class=" font-black">{{ $item->name }}</p>
                                    <p class=" text-sm">+62 {{ $item->phone_number }}</p>
                                    <p class=" text-sm line-clamp-2">{{ $item->address }}, ({{ $item->additional }})</p>
                                    <div class=" flex justify-between pt-2">
                                        <div class=" flex gap-2 w-full">
                                            <div x-data="{ edit: false }" class="">
                                                <button @click="edit = true"
                                                    class=" px-2 py-1 bg-second text-white hover:bg-third duration-300 rounded-md text-sm">Edit</button>
                                                @include('admin.address.edit')
                                            </div>
                                            @if (!$item->active)
                                                <form action="{{ route('address.destroy', ['address' => $item->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class=" px-2 py-1 bg-second text-white hover:bg-third duration-300 rounded-md text-sm">Delete</button>
                                                </form>
                                            @endif
                                        </div>
                                        @if ($item->active)
                                            <button
                                                class=" px-2 py-1 bg-third text-white hover:bg-third duration-300 rounded-md text-sm">Active</button>
                                        @else
                                            <form action="{{ route('address.active', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                <button
                                                    class=" px-2 py-1 bg-second text-white hover:bg-third duration-300 rounded-md text-sm">Unactive</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            <script>
                                function submitForm(formId) {
                                    document.getElementById(formId).submit();
                                }
                            </script>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.guest>
