<x-app-layout>
  <x-slot name="appname">
    home
  </x-slot>
  <x-slot name="slot">
    {{-- banner --}}
    <div class="bg-white py-5 ">
      <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
          @include('home.categoriesHover')
          @include('home.categoryHome')
{{-- fin banner --}}
    <div class="sm:px-16">
    <div class="flex flex-col gap-10">
        {{-- <x-carrousel-cat :products="$products"/> --}}
        @include('category.carrousel')
    </div>
  </x-slot>
</x-app-layout>
