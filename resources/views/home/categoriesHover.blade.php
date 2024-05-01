<ul class="flex items-center gap-2 flex-wrap justify-center font-semibold">
    @foreach ($categories->where('level', 1) as $category)
        <li class="relative rounded-xl border border-gray-900 hover:bg-gray-900 hover:text-white group px-3">
            <a href="{{ route('category.show', ['category' => $category->name]) }}" class="p-2 cursor-default">{{ $category->name }}</a>
    
            <!-- Level 2 Subcategories -->
            <div class="absolute top-0 transition group-hover:translate-y-5 translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-200 ease-in group-hover:transform z-50 w-[50vw] md:w-[40vw] transform">
                <div class="relative top-6 p-4 bg-white rounded-xl shadow-xl">
                    <div class="relative z-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @foreach ($category->children as $subcategory)
                                <div>
                                    <a href="{{ route('category.show.child', ['parentName' => $category->name, 'childName' => $subcategory->name]) }}" class="uppercase tracking-wider text-gray-500 font-sm text-[13px]">{{ $subcategory->name }}</a>
                                    <ul class="mt-3 text-[15px]">
                                        <!-- Level 3 Child Categories -->
                                        @foreach ($subcategory->children as $item)
                                            <li>
                                                <a href="{{ route('category.show.subchild', ['parentName' => $category->name, 'childName' => $subcategory->name, 'subchildName' => $item->name]) }}" class="text-gray-900">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
    </ul>
    