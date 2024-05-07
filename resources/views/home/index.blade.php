<x-app-layout>
  <x-slot name="appname">
    home
  </x-slot>
 
  <x-slot name="slot">
    {{-- banner --}}
    <div class="py-5 ">
      <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
          @include('home.categoriesHover')
          @include('home.categoryHome')
{{-- fin banner --}}

  <div class="mt-16">
  <h3 class="text-gray-600 text-2xl font-medium">Recommended products</h3>
  <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
      @foreach($products as $product)
        @include('category.articlecard')
      @endforeach
    </div>
  


 
</div>














    
  </x-slot>
</x-app-layout>
