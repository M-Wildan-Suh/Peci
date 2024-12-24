<!-- Modal -->
<div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-30 px-4">
    <div
        class="w-full max-w-[720px] max-h-[calc(100vh-16px)] bg-white pb-6 text-left rounded-md flex flex-col gap-4 relative border-2 border-main">
        <div class=" pt-6 pb-3 bg-main text-third z-30">
            <h2 class=" px-6 text-2xl font-bold">Edit Address</h2>
            <button @click="open = false"
                class=" absolute top-6 right-6 w-6 h-6 text-third hover:text-red-500 duration-300">
                <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                    enable-background="new 0 0 512 512">
                    <path
                        d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                        fill="currentColor" class="fill-000000"></path>
                </svg>
            </button>
        </div>
        <div class=" space-y-3 px-6 overflow-auto">
            <div class=" w-full">
                <button @click="add = true"
                    class=" w-full py-2 bg-second hover:bg-third duration-300 font-black rounded-md text-white">Add
                    Address</button>
                @include('admin.address.create')
            </div>
            <div class=" w-full space-y-2">
                @foreach ($address as $item)
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

        <div class=" pt-4">
            <div class=" px-6 w-full flex flex-col-reverse sm:flex-row justify-between items-center gap-4">
                <div class=" grid grid-cols-2 gap-3 w-full sm:w-auto">
                    <button @click="open=false"
                        class=" text-sm sm:text-base py-2 px-2 ms:px-4 text-white rounded duration-300 bg-second hover:bg-third">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
