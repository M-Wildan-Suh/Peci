<x-layout.guest>
    <div class=" space-y-8 sm:space-y-16 py-8 sm:py-16 px-4 md:px-8">
        <div class=" w-full max-w-[1080px] mx-auto">
            <div class=" space-y-8">
                <div class=" flex flex-row gap-2 items-center">
                    <div class=" w-1 h-6 bg-black rounded-full"></div>
                    <p class=" text-2xl font-black">Product</p>
                </div>
                <x-guest.component.product :product="$product" />
            </div>
        </div>
    </div>
</x-layout.guest>