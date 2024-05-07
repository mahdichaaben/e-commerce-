<x-app-layout>
    <x-slot name="appname">
        {{ $category->name }}
    </x-slot>
    <x-slot name="slot">
        @include('category.breadcrumb',['breadcrumbs'=>$breadcrumbs])
        
        <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 mt-8">
            @foreach($category->products as $product)
                @include('category.articlecard',['product'=>$product])
             {{-- <x-article :product="$product" /> --}}
            @endforeach
        </div>
    </x-slot>
</x-app-layout>
