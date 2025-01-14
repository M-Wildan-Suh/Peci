<div class=" space-y-4 pt-4 divide-y divide-main">
    <div class=" flex gap-4">
        <div class=" w-14 h-14 rounded-full overflow-hidden">
            <img src="{{asset('storage/images/user/'. Auth::user()->profile_picture)}}" class=" w-full h-full object-cover" alt="">
        </div>
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
        <a href="{{route('profile.edit')}}" class=" {{ request()->routeIs('profile.edit') ? ' text-second' : ' text-third' }} flex gap-3 items-center hover:text-second duration-300">
            <div class=" w-5 aspect-square">
                <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 112c-48.6 0-88 39.4-88 88s39.4 88 88 88 88-39.4 88-88-39.4-88-88-88zm0 128c-22.06 0-40-17.95-40-40 0-22.1 17.9-40 40-40s40 17.94 40 40c0 22.1-17.9 40-40 40zm0-240C114.6 0 0 114.6 0 256s114.6 256 256 256 256-114.6 256-256S397.4 0 256 0zm0 464c-46.73 0-89.76-15.68-124.5-41.79C148.8 389 182.4 368 220.2 368h71.69c37.75 0 71.31 21.01 88.68 54.21C345.8 448.3 302.7 464 256 464zm160.2-75.5c-27-42.2-73-68.5-124.4-68.5h-71.6c-51.36 0-97.35 26.25-124.4 68.48C65.96 352.5 48 306.3 48 256c0-114.7 93.31-208 208-208s208 93.31 208 208c0 50.3-18 96.5-47.8 132.5z" fill="currentColor" class="fill-000000"></path></svg>
            </div>
            <p>Profile</p>
        </a>
        <a href="{{route('address')}}" class=" {{ request()->routeIs('address') ? ' text-second' : ' text-third' }} flex gap-3 items-center hover:text-second duration-300">
            <div class=" w-5 aspect-square">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M2 10c0 8.491 9.126 13.658 9.514 13.874a1 1 0 0 0 .972 0C12.874 23.658 22 18.491 22 10a10 10 0 0 0-20 0Zm10-8a8.009 8.009 0 0 1 8 8c0 6.274-6.2 10.68-8 11.83-1.8-1.15-8-5.556-8-11.83a8.009 8.009 0 0 1 8-8Z" fill="currentColor" class="fill-232323"></path><path d="M12 15a5 5 0 1 0-5-5 5.006 5.006 0 0 0 5 5Zm0-8a3 3 0 1 1-3 3 3 3 0 0 1 3-3Z" fill="currentColor" class="fill-232323"></path></svg>
            </div>
            <p>Address</p>
        </a>
        <a href="{{route('transaction')}}" class=" {{ request()->routeIs('transaction') ? ' text-second' : ' text-third' }} flex gap-3 items-center hover:text-second duration-300">
            <div class=" w-5 aspect-square">
                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M20 4H4a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1ZM4 2a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h16a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3H4Zm2 5h2v2H6V7Zm5 0a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-3 4H6v2h2v-2Zm2 1a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2h-6a1 1 0 0 1-1-1Zm-2 3H6v2h2v-2Zm2 1a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2h-6a1 1 0 0 1-1-1Z" fill="currentColor" fill-rule="evenodd" class="fill-000000"></path></svg>
            </div>
            <p>Transactions</p>
        </a>
        {{-- <a href="" class=" flex gap-3 items-center text-third hover:text-second duration-300">
            <div class=" w-5 aspect-square">
                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M20 4H4a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1ZM4 2a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h16a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3H4Zm2 5h2v2H6V7Zm5 0a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-3 4H6v2h2v-2Zm2 1a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2h-6a1 1 0 0 1-1-1Zm-2 3H6v2h2v-2Zm2 1a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2h-6a1 1 0 0 1-1-1Z" fill="currentColor" fill-rule="evenodd" class="fill-000000"></path></svg>
            </div>
            <p>Vouchers</p>
        </a> --}}
    </div>
</div>