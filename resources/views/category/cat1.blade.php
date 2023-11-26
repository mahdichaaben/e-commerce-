<x-app-layout>
    <x-slot name="appname">
        {{ $category->name }}
    </x-slot>
    <x-slot name="slot">
        @include('components.partials.header')
        <x-breadcrumb :breadcrumbs="$breadcrumbs" />
        <div class=" grid grid-cols-3 gap-2 sm:grid-cols-6  md:gap-3 xl:gap-8">
            @foreach($category->children as $category)
                <a href="{{ route('category.show', ['category' => $category->name]) }}" class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
                    <img src="{{ Storage::url($category->image) }}" loading="lazy" alt="Photo by {{ $category->name }}" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50"></div>
                    <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">{{ $category->name }}</span>
                </a>
            @endforeach
        </div>
        
    </x-slot>
</x-app-layout>
