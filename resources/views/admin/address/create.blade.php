<div x-show="add" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-30 px-4">
    <div
        class="w-full max-w-[720px] max-h-[calc(100vh-16px)] bg-white pb-6 text-left rounded-md flex flex-col gap-4 relative border-2 border-main">
        <div class=" pt-6 pb-3 bg-main text-third z-30">
            <h2 class=" px-6 text-2xl font-bold">Add Address</h2>
            <button @click="add = false"
                class=" absolute top-6 right-6 w-6 h-6 text-third hover:text-red-500 duration-300">
                <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                    enable-background="new 0 0 512 512">
                    <path
                        d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                        fill="currentColor" class="fill-000000"></path>
                </svg>
            </button>
        </div>
        <form id="add" action="{{ route('address.store') }}" method="POST">
            @csrf
            <div class=" space-y-3 px-6 overflow-auto">
                <x-admin.component.textinput title="Nama Penerima" placeholder="Input Your Name..." :value="''"
                    name="name" />
                <x-admin.component.linkinput title="No Telepone" placeholder="Input Phone Number..." :value="''"
                    name="phone_number" link="+62" />
                <x-admin.component.textareainput title="Address" placeholder="Input Address..." value=""
                    name="address" />
                <x-admin.component.textareainput title="Aditional" placeholder="Input Aditional..." value=""
                    name="additional" />
            </div>
        </form>

        <div class=" pt-4">
            <div class=" px-6 w-full flex flex-col-reverse sm:flex-row justify-between items-center gap-4">
                <div class=" grid grid-cols-2 gap-3 w-full sm:w-auto">
                    <button onclick="document.getElementById('add').submit()"
                        class=" text-sm sm:text-base py-2 px-2 ms:px-4 text-white rounded duration-300 bg-second hover:bg-third">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
