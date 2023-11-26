<div>
    <h1>categories</h1>
    <div class="mt-6">

        <div class="flex justify-between">
            <div class="">
                <input wire:model.debounce.500ms="q" type="search" placeholder="search" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

            </div>
            <div class="mr-2">
                <x-primary-button wire:click="setCurrentToadd()" x-data="" x-on:click.prevent="$dispatch('open-modal', 'category-add')">Add</x-primary-button>
                

            </div>
        </div>
@if($categories->count())
<div class="py-5 flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="border rounded-lg shadow overflow-hidden dark:border-gray-700 dark:shadow-gray-900">
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">id</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">image</th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase dark:text-gray-400">actions</th>
              </tr>
            </thead>
            @if($categories->count()>0)
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
              @foreach ($categories as $category)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$category->id}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$category->name}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><img src="{{Storage::url($category->image)}}" alt="icon" class="w-20 rounded-xl"></td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <x-primary-button wire:click="setCurrentToedit({{$category->id}})" x-data="" x-on:click.prevent="$dispatch('open-modal', 'category-add')"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/></svg></x-primary-button>
                  <x-danger-button wire:click="setCurrentTodelete({{$category->id}})" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-category-deletion')"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>   </x-danger-button>
                </td>
              </tr>
              @endforeach
            </tbody>
            @endif
          </table>
        </div>
      </div>
    </div>
  </div>
  
        @endif

        <div class="mt-4">{{$categories->links()}}</div>


    </div>


    <x-modal name="confirm-category-deletion"  focusable>
        <div class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this category?') }}
            </h2>


            <div class="mt-6 flex justify-end">
                <x-secondary-button wire:click="$set('currentToDelete',false)" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button x-on:click="$dispatch('close')" wire:click="categoryDeletion({{$currentToDelete}})" class="ml-3">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </div>
    </x-modal>

    <x-modal name="category-add" focusable>
        <div class="p-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                @if($currentToEdit) Edit  @else Add @endif category
            </h2>
        </header>

    <form class="flex flex-col gap-5" wire:submit.prevent="addCategory()" enctype="multipart/form-data">
    
            <div>
                <x-input-label for="name" class="py-5" :value="__('category name')" />
                <x-text-input id="name" wire:model="name" type="text" class="mt-1 block w-full"  />
                @error('name') <span class="text-red-400">{{ $message }}</span> @enderror
            </div>
    
            <div>
                <x-input-label for="name" class="py-5" :value="__('chose icon')" />               
                 <input id="image" wire:model="image" type="file" type="file" name="file-input"  class="block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                  file:bg-transparent file:border-0
                  file:bg-gray-100 file:mr-4
                  file:py-3 file:px-4"
                  >
                
               
                @error('image') <span class="text-red-400">{{ $message }}</span> @enderror    
                @if($oldImage&&!$image)
                <img src="{{Storage::url($oldImage)}}"  wire:model="image" class="" width="100">
                @endif
                @if($image)
                <img src="{{$image->temporaryUrl()}}"  wire:model="image" class="" width="100">
               @endif
            </div>
            @if($currentToAdd) 
            <div>
                <x-input-label for="parent_id" class="py-5"  :value="__('chose category parent')" /> 
                    <select id="categorySelect"  wire:model="parent_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-1/2 p-2.5 " >
                      <option   value="{{null}}">None</option>
                    @foreach($rootcategories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @foreach($category->children as $subcategory)
                          <option value="{{$subcategory->id}}">  -   {{$subcategory->name}}</option>
                        @endforeach     
                    @endforeach
                    </select>
                    @error('parent_id') <span class="text-red-400">{{ $message }}</span> @enderror
            </div>
           @endif



    
            <div class="mt-6 flex justify-end">
                <x-secondary-button wire:click="$set('currentToAdd',false)" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
    
                <x-danger-button type="submit" class="ml-3">
                    {{ __('Save') }}
                </x-danger-button>
            </div>
       
    
    </form>
        </div>
        </x-modal>

      
</div>