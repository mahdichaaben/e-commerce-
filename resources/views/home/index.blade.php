<x-app-layout>
  <x-slot name="appname">
    home
  </x-slot>
  <x-slot name="slot">
    {{-- banner --}}
    <div class="bg-white py-5 ">
      <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
  
          @include('components.partials.header')
  
          <div class="bg-white py-6 ">

                <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 md:gap-3 xl:gap-8">
                    @foreach($categories->where('level', 1) as $ind => $category)
                        <a href="{{ route('category.show', ['category' => $category->name]) }}"
                            class="group relative flex h-48 items-end overflow-hidden  rounded-lg bg-gray-100 shadow-lg md:h-80">
                            <img src="{{ Storage::url($category->image) }}"
                                loading="lazy"
                                alt="Photo by {{ $category->name }}"
                                class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50"></div>
                            <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">{{ $category->name }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        
{{-- fin banner --}}

    <div class="sm:px-16">
      <div class="flex flex-col gap-10">
        <x-carrousel-cat :products="$products"/>
    </div>
  </x-slot>
</x-app-layout>
