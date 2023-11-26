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


  