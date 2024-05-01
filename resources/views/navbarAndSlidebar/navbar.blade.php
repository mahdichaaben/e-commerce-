<header class="border-b  ">
    <div class="flex items-center justify-between p-2">
      <!-- Navbar left -->
      <div class="flex items-center space-x-3">
        <!-- Toggle sidebar button -->
        <button id="navbarToggleBtn" class="p-2 rounded-md focus:outline-none focus:ring">
          <svg class="w-4 h-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
          </svg>
        </button>
        <a href="/" class="p-2 text-xl font-semibold tracking-wider uppercase">HYPER</a>
      </div>
      <div class="relative w-[40%] text-gray-600">
        <input type="search" name="serch" placeholder="Search" class="bg-white h-10 w-full px-5 pr-10 rounded-full text-sm focus:outline-none">
        <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
          <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
          </svg>
        </button>
      </div>
     
    
      <div class="flex  md:gap-10">
       <a href="/panier"><img src="/icons/shopping-bag_1656850.png" class="h-6 mr-2 mt-2 cursor-pointer" alt=""/></a> 
        @auth
        <img id="avatarButton" type="button" class="w-10 h-10 rounded-full cursor-pointer" src={{Storage::url(Auth::user()->image)}} alt="User dropdown">
       @else
        <img id="avatarButton" type="button" class="w-10 h-10 rounded-full cursor-pointer" src="/icons/account-26.svg" alt="User dropdown">
        @endauth
      </div>
     
      <div id="userDropdown" class="z-20 hidden absolute top-20 right-0 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
     
      @auth
        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
          <div>{{ Auth::user()->name }}</div>
          <div class="font-medium truncate">{{ Auth::user()->email }}</div>
        </div>
        <x-dropdown-link :href="route('profile.edit')">
          {{ __('Profile') }}
        </x-dropdown-link>

        <!-- dashboard-->
        <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
          <ul class="p-2 overflow-hidden">
            <li>
              @include('components.sidebarlinks.authentificationlinks')
            </li>
          </ul>
        </nav>
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-dropdown-link>
     
          


        </form>
        @else
        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
          <a href="/login"> log in </a>
         
        </div>
        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
          <a href="/register">register</a>
         
        </div>
        @endauth
      </div>
   

      {{-- <a href="/login" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-500 text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
        Sign In
      </a> --}}

     
    </div>
  </header>