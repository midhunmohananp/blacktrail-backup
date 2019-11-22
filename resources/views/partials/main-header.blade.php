<header class="mainHeader sm:mt-0">
    <svg class="fill-current text-blue-darker h-10 w-10 mr-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M9 9H8c.55 0 1-.45 1-1V7c0-.55-.45-1-1-1H7c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1H6c-.55 0-1 .45-1 1v2h1v3c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-3h1v-2c0-.55-.45-1-1-1zM7 7h1v1H7V7zm2 4H8v4H7v-4H6v-1h3v1zm2.09-3.5c0-1.98-1.61-3.59-3.59-3.59A3.593 3.593 0 0 0 4 8.31v1.98c-.61-.77-1-1.73-1-2.8 0-2.48 2.02-4.5 4.5-4.5S12 5.01 12 7.49c0 1.06-.39 2.03-1 2.8V8.31c.06-.27.09-.53.09-.81zm3.91 0c0 2.88-1.63 5.38-4 6.63v-1.05a6.553 6.553 0 0 0 3.09-5.58A6.59 6.59 0 0 0 7.5.91 6.59 6.59 0 0 0 .91 7.5c0 2.36 1.23 4.42 3.09 5.58v1.05A7.497 7.497 0 0 1 7.5 0C11.64 0 15 3.36 15 7.5z"/></svg>
    <a href="{{ route('index') }}">
        <h1 class="text-grey-darkest hover:text-black mt-2 font-display roman text-bold tracking-tight font-bold">Blacktrail
        </h1>
    </a>

    @auth

    <div id="profile" class="absolute flex text-black" style="right: 1rem;">
        <p class="mt-3 font-basic font-bold mr-4">{{ $displayName }}</p> 
        <img id="userAvatar" @click="showSidebar ^= true" class="h-10 w-10 rounded-full mb-2 border-white border-4 avatarImg" src="{{ asset('assets/images/avatar.jpg') }}" alt="Avatar">
        <div v-show="showSidebar" class="dropdown-menu mr-2 h-42 show" style="position: absolute; transform: translate3d(-57px, 34px, 0px); top: 0px; right: -30px; will-change: transform;">
            <nav class="font-medium font-basic ml-3 mt-1">
                <ul class="list-reset p-2">
                    <li class="listStyle"><a href="/account"  class="hover:text-red">Account</a></li>
                    <li class="listStyle"><a href="{{ route('profiles.user',auth()->user()->id) }}" class="hover:text-red">Profile</a></li>
                    <li class="listStyle"><a href="/logout"  class="hover:text-red">Logout</a></li>
                </ul>
            </nav>
        </div>
    </div>
    @endauth
    
</header>