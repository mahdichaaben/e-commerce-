<header class="border-b  bg-gray-100">
    <div class="flex items-center justify-between p-2">
      <!-- Navbar left -->
      <div class="flex items-center space-x-3">
        <!-- Toggle sidebar button -->
        <button id="openSide" class="p-2 rounded-md focus:outline-none focus:ring">
          <svg class="w-4 h-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
          </svg>
        </button>
        <a href="/" class="p-2 text-xl font-semibold tracking-wider uppercase">HYPER</a>
      </div>
      <div class="relative w-[40%] text-gray-600">
        <form action="{{ route('filterPage.index')}}" method="GET">
          <input type="search" name="keywords" placeholder="Search" class="bg-white h-10 w-full px-5 pr-10 rounded-full text-sm focus:outline-none">
          <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
              <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
            </svg>
          </button>

        </form>
       
      </div>
     
    
      <div class="flex  md:gap-10">
       <a href="{{route('cart.show')}}"><img src="/icons/shopping-bag_1656850.png" class="h-6 mr-2 mt-2 cursor-pointer" alt=""/></a> 
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


<aside id="sidebar" class="absolute inset-y-0 z-20 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg -translate-x-full ">
    <!-- sidebar header -->
    <div class="flex items-center justify-between flex-shrink-0 p-1 border-b">
      <span class="p-[0.66rem]  text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">
        Our categories
      </span>
      <button id="clodsesidebar" class="p-2 rounded-md">
        <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <div class="p-5">
      <h1 class="uppercase font-bold text-gray-900">categories</h1>
      @foreach($categories->where('level', 1) as $category)
          <div x-data="{ open: false }" x-cloak>
              <div class="flex justify-between items-center">
                  <a href="{{ route('category.show', ['category' => $category->name]) }}" class="ml-2 text-lg flex cursor-pointer items-center p-2 text-gray-500 hover:text-blue-500">
                      {{ $category->name }}
                  </a>
                  <a href="#" @click.prevent="open = !open" role="button" aria-haspopup="true"
                      :aria-expanded="open ? 'true' : 'false'">
                      <span aria-hidden="true" class="ml-auto">
                          <svg class="w-6 h-6  transition-transform transform" :class="{ 'rotate-180': open }"
                              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                          </svg>
                      </span>
                  </a>
              </div>
              <div x-show="open" class="flex flex-col mt-2 space-y-2 px-7" role="menu" aria-label="Subcategories">
                  @foreach($category->children as $subcategory)
                      <a href="{{ route('category.show.child', ['parentName' => $category->name, 'childName' => $subcategory->name]) }}"
                          class="hover:text-blue-500">
                          {{ $subcategory->name }}
                      </a>
                  @endforeach
              </div>
          </div>
      @endforeach
    </div>


    
    
    
      
   

  </aside>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
    // Get the avatar button and user dropdown elements
    const avatarButton = document.getElementById("avatarButton");
    const userDropdown = document.getElementById("userDropdown");

    // Add click event listener to the avatar button
    avatarButton.addEventListener("click", function() {
        // Toggle the visibility of the user dropdown
        userDropdown.classList.toggle("hidden");
    });

    // Close the user dropdown when clicking outside of it
    document.addEventListener("click", function(event) {
        if (!avatarButton.contains(event.target) && !userDropdown.contains(event.target)) {
            userDropdown.classList.add("hidden");
        }
    });



    const sidebar = document.getElementById("sidebar");
    const openSideButton = document.getElementById("openSide");
    const closeSideButton=document.getElementById("clodsesidebar");
    // Add click event listener to the openSide button
    openSideButton.addEventListener("click", function() {
        // Toggle the visibility of the sidebar
        sidebar.classList.toggle("-translate-x-full");
    });
    closeSideButton.addEventListener("click", function() {
        // Toggle the visibility of the sidebar
        sidebar.classList.toggle("-translate-x-full");
    });
});
  </script>