<div x-data="{ isOpen: false }" class=" flex sm:hidden">
    <div class=" fixed bottom-4 left-0 w-full px-4 z-30">
        <div class=" w-full rounded-full bg-main shadow-md shadow-black/20 py-2 px-3 text-xs grid grid-cols-3 border border-third/20">
            <a href="{{route('home')}}" class=" flex flex-col items-center text-third hover:text-byolink-3 duration-300">
                <button class=" w-6 aspect-square">
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M16 3a13 13 0 1 0 13 13A13 13 0 0 0 16 3Zm6.69 16.91A24.39 24.39 0 0 0 23 16a23.72 23.72 0 0 0-.32-3.91C25.37 13.08 27 14.58 27 16s-1.69 3-4.31 3.91ZM5 16c0-1.47 1.69-2.95 4.31-3.91A24.39 24.39 0 0 0 9 16a23.72 23.72 0 0 0 .32 3.91C6.63 18.92 5 17.42 5 16Zm6.5-10a14.2 14.2 0 0 0-1.68 3.82A14.19 14.19 0 0 0 6 11.49 11 11 0 0 1 11.5 6ZM6 20.5a14.63 14.63 0 0 0 4.32 1.8h.09A23.4 23.4 0 0 0 16 23c.6 0 1.19 0 1.76-.06a1 1 0 1 0-.14-2Q16.83 21 16 21a20.92 20.92 0 0 1-4.52-.47A21.33 21.33 0 0 1 11 16c0-6.48 2.64-11 5-11 1 0 2 .76 2.89 2.14a1 1 0 0 0 .84.47 1 1 0 0 0 .54-.15 1 1 0 0 0 .31-1.38.86.86 0 0 0-.07-.1A11 11 0 0 1 26 11.5a14.94 14.94 0 0 0-4.48-1.84A23.21 23.21 0 0 0 16 9c-.6 0-1.19 0-1.76.06a1 1 0 1 0 .14 2Q15.18 11 16 11a20.92 20.92 0 0 1 4.52.47A21.33 21.33 0 0 1 21 16c0 6.48-2.64 11-5 11-1 0-2-.76-2.89-2.14a1 1 0 1 0-1.69 1.06.86.86 0 0 0 .07.1A11 11 0 0 1 6 20.5ZM20.5 26a14.2 14.2 0 0 0 1.68-3.85A14.19 14.19 0 0 0 26 20.51 11 11 0 0 1 20.5 26Z" data-name="world www web website" fill="currentColor" class="fill-000000"></path></svg>
                </button>
                <p>Website</p>
            </a>
            <div class=" flex justify-center relative">
                <button @click="isOpen = !isOpen" class=" aspect-square rounded-full duration-300 text-white p-1.5"
                :class="isOpen ? ' bg-third rotate-90' : 'bg-second'">
                    <svg viewBox="0 0 32 32" class=" w-auto h-auto" xmlns="http://www.w3.org/2000/svg"><path d="M12 4H6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 8H6V6h6ZM26 4h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 8h-6V6h6ZM12 18H6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2Zm0 8H6v-6h6ZM26 18h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2Zm0 8h-6v-6h6Z" fill="currentColor" class="fill-000000"></path><path data-name="<Transparent Rectangle>" d="M0 0h32v32H0z" fill="none"></path></svg>
                </button>
            </div>
            <form method="POST" class=" w-full" action="{{ route('logout') }}">
                <div class=" flex flex-col items-center text-third hover:text-byolink-3 duration-300">
                    @csrf
                    <button id="logout" class=" w-6 aspect-square">
                        <svg viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"><g id="_icons"><path d="M20.9 11.6c-.1-.1-.1-.2-.2-.3l-3-3c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l1.3 1.3H13c-.6 0-1 .4-1 1s.4 1 1 1h4.6l-1.3 1.3c-.4.4-.4 1 0 1.4.2.2.5.3.7.3s.5-.1.7-.3l3-3c.1-.1.2-.2.2-.3.1-.3.1-.5 0-.8z" fill="currentColor" class="fill-000000"></path><path d="M15.5 18.1c-1.1.6-2.3.9-3.5.9-3.9 0-7-3.1-7-7s3.1-7 7-7c1.2 0 2.4.3 3.5.9.5.3 1.1.1 1.4-.4.3-.5.1-1.1-.4-1.4C15.1 3.4 13.6 3 12 3c-5 0-9 4-9 9s4 9 9 9c1.6 0 3.1-.4 4.5-1.2.5-.3.6-.9.4-1.4-.3-.4-.9-.6-1.4-.3z" fill="currentColor" class="fill-000000"></path></g></svg>
                    </button>
                    <label for="logout">Logout</label>
                </div>
            </form>
        </div>
    </div>
    <div 
        class="fixed w-[calc(100vw-32px)] bg-main shadow-md shadow-black/20 bottom-[44px] rounded-t-md z-10 transition-all duration-300 overflow-hidden border border-third/20"
        :class="isOpen ? ' h-36 pb-7' : 'h-0'">
        <div class=" grid grid-cols-2 p-4 gap-4 text-sm">
            <x-admin.mobile-navbutton route="dashboard" :active="'dashboard'">
                <x-slot:svg>
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z" fill="currentColor" class="fill-000000"></path></svg>
                </x-slot:svg>
                Dashboard
            </x-admin.mobile-navbutton>
            <x-admin.mobile-navbutton route="user.index" :active="'user.index'">
                <x-slot:svg>
                    <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h256v256H0z"></path><path d="M231.9 212a120.7 120.7 0 0 0-67.1-54.2 72 72 0 1 0-73.6 0A120.7 120.7 0 0 0 24.1 212a7.7 7.7 0 0 0 0 8 7.8 7.8 0 0 0 6.9 4h194a7.8 7.8 0 0 0 6.9-4 7.7 7.7 0 0 0 0-8Z" fill="currentColor" class="fill-000000"></path></svg>
                </x-slot:svg>
                User
            </x-admin.mobile-navbutton>
            <x-admin.mobile-navbutton route="product.index" :active="['product.index', 'product.show', 'product.create']">
                <x-slot:svg>
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M2 3h20v4H2zm17 5H3v11a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8h-2zm-3 6H8v-2h8v2z" fill="currentColor" class="fill-000000"></path></svg>
                </x-slot:svg>
                Product
            </x-admin.mobile-navbutton>
            <x-admin.mobile-navbutton route="transaction.index" :active="['transaction.index', 'transaction.show', 'transaction.create']">
                <x-slot:svg>
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M22 6h-7a6 6 0 1 0 0 12h7v2a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v2zm-7 2h8v8h-8a4 4 0 1 1 0-8zm0 3v2h3v-2h-3z" fill="currentColor" class="fill-000000"></path></svg>
                </x-slot:svg>
                Transaction
            </x-admin.mobile-navbutton>
        </div>
    </div>
</div>