<x-layout.guest>
    <div class=" space-y-8 sm:space-y-16 py-8 sm:py-16 px-4 md:px-8">
        <div class=" w-full max-w-[1080px] mx-auto">
            <div class=" w-full grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class=" w-full pr-8">
                    @include('components.guest.profile-menu')
                </div>
                <div class="md:col-span-2 w-full space-y-4" x-data="{ activeModal: 'semua' }">
                    <div class="p-4 sm:p-8 bg-main shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
        
                    <div class="p-4 sm:p-8 bg-main shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
        
                    <div class="p-4 sm:p-8 bg-main shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.guest>

