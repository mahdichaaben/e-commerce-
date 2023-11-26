<div>
    <h1>Products</h1>
    <div class="mt-6 sm:px-2">
        <div class="flex justify-between">
            <div>
                <input wire:model.debounce.500ms="q" type="search" placeholder="Search" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mr-2">
                <x-primary-button wire:click="setCurrentToAdd()" x-data="" x-on:click.prevent="$dispatch('open-modal', 'product-add')">Add</x-primary-button>
            </div>
        </div>

        @if ($products->count())
        <div class="py-5">
            <div class="overflow-x-auto">
                <div class="border rounded-lg shadow dark:border-gray-700 dark:shadow-gray-900">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Category</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Images</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Options</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $product->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $product->category->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 flex gap-2 flex-wrap">
                                    @if($product->images)
                                    @foreach ($product->images as $image)
                                    <img src="{{ Storage::url($image->slug) }}" alt="Product Image" class="w-10 h-10 rounded">
                                    @endforeach
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"> <x-primary-button wire:click="setCurrentToEdit({{ $product->id }})" x-data="" x-on:click.prevent="$dispatch('open-modal', 'option-product')">+</x-primary-button>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <x-primary-button wire:click="setCurrentToEdit({{ $product->id }})" x-data="" x-on:click.prevent="$dispatch('open-modal', 'product-add')"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <style>
                                                svg {
                                                    fill: #ffffff
                                                }
                                            </style>
                                            <path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z" />
                                        </svg></x-primary-button>
                                    <x-danger-button wire:click="setCurrentToDelete({{ $product->id }})" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion')"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <style>
                                                svg {
                                                    fill: #ffffff
                                                }
                                            </style>
                                            <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                        </svg> </x-danger-button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="mt-4">{{$products->links()}}</div>
        @endif

    </div>
    <x-modal name="confirm-product-deletion" focusable>
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this product?') }}
            </h2>

            <div class="mt-6 flex justify-end">
                <x-secondary-button wire:click="$set('currentToDelete', false)" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button x-on:click="$dispatch('close')" wire:click="productDeletion({{ $currentToDelete }})" class="ml-3">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </div>
    </x-modal>

    <x-modal name="product-add" focusable>
        <div class="p-6">
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    @if ($currentToEdit) Edit @else Add @endif product
                </h2>
            </header>

            <form class="flex flex-col gap-5" wire:submit.prevent="addProduct()" enctype="multipart/form-data">
                <div>
                    <x-input-label for="name" class="py-5" :value="__('Product name')" />
                    <x-text-input id="name" wire:model="name" type="text" class="mt-1 block w-full" />
                    @error('name') <span class="text-red-400">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-input-label for="slug" class="py-5" :value="__('Product slug')" />
                    <x-text-input id="slug" wire:model="slug" type="text" class="mt-1 block w-full" />
                    @error('slug') <span class="text-red-400">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-input-label for="description" class="py-5" :value="__('Product description')" />
                    <textarea id="message" rows="4" wire:model="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Write your thoughts here..."></textarea>
                    @error('description') <span class="text-red-400">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-input-label for="price" class="py-5" :value="__('Product price')" />
                    <x-text-input id="price" wire:model="price" type="number" class="mt-1 block w-full" step="0.01" />
                    @error('price') <span class="text-red-400">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-input-label for="discount_price" class="py-5" :value="__('Product discount price')" />
                    <x-text-input id="discount_price" wire:model="discount_price" type="number" class="mt-1 block w-full" step="0.01" />
                    @error('discount_price') <span class="text-red-400">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-input-label for="category_id" class="py-5" :value="__('Product category')" />
                    <select id="category_id" wire:model="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-1/2 p-2.5">
                        <option value="" selected disabled>Select a category</option>
                        @foreach ($categories->where('level',3) as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="text-red-400">{{ $message }}</span> @enderror
                </div>



                <div>

                    <x-input-label for="images" class="py-5" :value="__('Choose images')" />
                    <input id="images" wire:model="images" type="file" multiple class="block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 file:bg-transparent file:border-0 file:bg-gray-100 file:mr-4 file:py-3 file:px-4">
                    <div class="flex gap-2">
                        @if ($images)
                        @foreach ($images as $index => $image)
                        @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" alt="New Image" class="w-10 h-10 rounded-full">
                        @endif
                        @endforeach
                        @endif
                        @error('images') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                </div>



                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Identification</h3>
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <input id="horizontal-list-radio-license" type="radio" value=1 wire:model="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="horizontal-list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">public</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <input id="horizontal-list-radio-id" type="radio" value=0 wire:model="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="horizontal-list-radio-id" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">private</label>
                        </div>
                    </li>
                </ul>

                @error('status') <span class="text-red-400">{{ $message }}</span> @enderror




                <div class="mt-6 flex justify-end">
                    <x-secondary-button wire:click="$set('currentToAdd', false)" x-on:click.prevent="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button type="submit" class="ml-3">
                        {{ __('Save') }}
                    </x-danger-button>
                </div>
            </form>
        </div>
    </x-modal>


    <x-modal name="option-product" focusable>
        <div class="p-6">
            @if($currentToEdit)
            @livewire('productoptions', ['product' => $currentToEdit])
            @endif
        </div>
</div>
</x-modal>
</div>