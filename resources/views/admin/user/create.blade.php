<x-app-layout title="Add User">
    <div class="w-full p-6 bg-main rounded-md shadow-md shadow-third/20">
        <form method="POST" action="{{route('user.store')}}">
            @csrf
            <div class="w-full space-y-6 text-sm sm:text-base font-medium">
                <!-- Name -->
                <div class="space-y-2">
                    <label for="name">Name</label>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="space-y-2">
                    <label for="email">Email</label>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex flex-col gap-2 text-sm sm:text-base font-medium">
                    <label for="status">Role</label>
                    <select name="status" class="text-sm sm:text-base rounded-md border border-second focus:ring-third focus:border-third bg-background" id="status" >
                        {{-- <option value="" selected disabled>Change Status</option> --}}
                        <option value="user">User</option>
                        <option value="admin" selected>Admin</option>
                    </select>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <label for="password">Password</label>

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2">
                    <label for="password_confirmation">Confirm Password</label>

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <x-admin.component.submitbutton title="Tambah" />
            </div>
        </form>
    </div>
</x-app-layout>
