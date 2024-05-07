                <x-app-layout>  
                    <x-slot name="appname">
                        article
                    </x-slot>
                    <x-slot name="slot">

                        <div class="flex flex-col justify-between mt-10 lg:flex-row px-5 gap-8 items-start">
                            <div class="w-full  md:w-[50%]">
                                @if ($product->images && count($product->images) > 0)
                                    <!-- Main Product Image using the first image from the images -->
                                    <img src="{{ Storage::url($product->images[0]->slug) }}" alt="{{ $product->name }}" id="mainImage" class="w-full aspect-[3/2]">

                                    <!-- Thumbnail Images -->
                                    <div class="grid grid-cols-5 gap-4 mt-4" id="thumbnailContainer">
                                        @foreach ($product->images as $index => $image)
                                            <img src="{{ Storage::url($image->slug) }}" alt="Product Image" class="w-full h-20 rounded cursor-pointer" onclick="changeImage({{ $index }})">
                                        @endforeach
                                    </div>
                                @endif
                            </div>     

                            <!-- ABOUT -->
                            <div class="md:w-[50%] px-5">
                                <h2 class="text-3xl font-medium uppercase mb-2">{{ $product->name }}</h2>




                                <!-- Price -->
                                <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                                    <p class="text-xl text-primary font-semibold">{{ $product->price }}</p>
                                    <p class="text-base text-gray-400 line-through">{{ $product->discountPrice }}</p>
                                </div>

                                <!-- Description -->
                                <h3 class="text-sm text-gray-800 uppercase mb-1">Product description</h3>
                                <p class="mt-4 text-gray-600">{{ $product->description }}</p>

                <!-- Options Selector -->
                <div class="pt-4">
                    <h3 class="text-sm text-gray-800 uppercase mb-1">Options</h3>
                    <div class="flex items-center gap-2">
                        @foreach ($product->options as $option)
                            <div class="size-selector">
                                <input type="radio" name="size" id="option-{{ $option->id }}" class="hidden">
                                <label for="option-{{ $option->id }}"
                                    class="text-xs border border-gray-200 rounded-sm p-2 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">{{ $option->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>


                                <!-- Quantity Selector -->
                                <div class="mt-4">
                                    <h3 class="text-sm text-gray-800 uppercase mb-1">Quantity</h3>
                                    <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                                        <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none"
                                            onclick="decreaseQuantity()">-</div>
                                        <div id="quantityValue" class="h-8 w-8 text-base flex items-center justify-center">0</div>
                                        <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none"
                                            onclick="increaseQuantity()">+</div>
                                    </div>
                                </div>

                                <!-- Add to Cart and Wishlist Buttons -->
                                <div class="mt-6 flex gap-3 border-b border-gray-200 pb-5 pt-5">
                                    <a href="#" class="bg-gray-800 border border-gray-900 text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-gray-900 transition">
                                        Add to Cart
                                    </a>
                                </div>

                                
                            </div>
                        </div>
                        <!-- comment section -->
                       @include('product.comment',['product'=>$product])


                        <script>
                            var images = [
                                @foreach ($product->images as $image)
                                    "{{ Storage::url($image->slug) }}",
                                @endforeach
                            ];

                            var currentIndex = 0;
                            var mainImage = document.getElementById('mainImage');

                            function changeImage(index) {
                                currentIndex = index;
                                mainImage.src = images[currentIndex];
                            }

                            function previousImage() {
                                if (currentIndex > 0) {
                                    currentIndex--;
                                    changeImage(currentIndex);
                                }
                            }

                            function nextImage() {
                                if (currentIndex < images.length - 1) {
                                    currentIndex++;
                                    changeImage(currentIndex);
                                }
                            }

                            var quantity = 0; // Initial quantity value

                            function decreaseQuantity() {
                                if (quantity > 1) {
                                    quantity--;
                                    updateQuantity();
                                }
                            }

                            function increaseQuantity() {
                                quantity++;
                                updateQuantity();
                            }

                            function updateQuantity() {
                                var quantityValue = document.getElementById('quantityValue');
                                quantityValue.innerText = quantity;
                            }
                        </script>
                    </x-slot>
                </x-app-layout>









{{-- 
 --}}
