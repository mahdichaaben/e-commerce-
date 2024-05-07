<x-app-layout>
    <x-slot name="appname">
        Cart Shopping
    </x-slot>
    <x-slot name="slot">

        <div class="pt-20">
            <h1 class="mb-10 text-center text-2xl font-bold">
                Cart Items
            </h1>
            <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
                <div class="rounded-lg md:w-2/3">

                    @foreach($cartItems as $item)

                    <div class="relative justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                        <img src="{{ Storage::url($item->images()->first()->slug) }}" alt="product-image"
                            class="w-full rounded-lg sm:w-40  sm:h-40" />
                        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                            <div class="mt-5 w-full  sm:mt-0">
                                <h2 class="text-lg font-bold text-gray-900">
                                    {{ $item->name }}
                                </h2>
                                <span id="total-price-{{$item->id}}" data-price="{{ $item->price }}" class="price-display mt-1 text-xs text-gray-700">
                                    {{ $item->price }} dt
                                </span>
                                @if($item->options->isNotEmpty())
                             

                                    <div class="flex items-center gap-2">
                                        <select id="options-{{ $item->id}}"
                                            class="border w-20 border-gray-300 text-gray-600 rounded-lg block h-min py-1 text-xs px-2   focus:outline-none">
                                            @foreach($item->options as $option)
                                            <option value="{{ $option->id }}" data-max-quantity="{{ $option->quantity }}">{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="relative flex items-center">
                                            <button type="button"
                                                id="decrement-button-{{ $item->id }}"
                                                data-input-counter-decrement="counter-input-{{ $item->id }}"
                                                class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
                                                onclick="decrementQuantity({{ $item->id }})">
                                                <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="text" 
                                            id="counter-input-{{ $item->id }}" 
                                            class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                            placeholder=""
                                            value="1"
                                            required
                                            
                                            onchange="validateQuantity('{{ $item->id }}')">
                                            <button type="button"
                                                id="increment-button-{{ $item->id }}"
                                                
                                                class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
                                                onclick="incrementQuantity({{ $item->id }})">
                                                <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <span id="quantity-error-{{ $item->id }}"
                                        class="text-xs text-red-500 "></span>

                               
                                @endif
                            </div>
                        </div>

                        <form action="/itemkill" method="post">
                            @csrf
                            <input name="product_id" value="{{$item->id}}" type="hidden">
                            <button type="submit" class="absolute top-2 right-2 flex items-center space-x-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </form>

                    </div>
                    @endforeach

                </div>
                <!-- Sub total -->
                <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                    <div class="mb-2 flex justify-between">
                        <p class="text-gray-700">
                            Subtotal
                        </p>
                        <span id="subtotal-amount"></span><!-- Placeholder for Subtotal amount -->
                    </div>
                    {{-- <div class="flex justify-between">
                        <p class="text-gray-700">
                            Shipping
                        </p>
                        <!-- Insert Shipping amount here -->
                    </div> --}}
                    <hr class="my-4" />
                    <div class="flex justify-between">
                        <p class="text-lg font-bold">
                            Total
                        </p>
                        <!-- Insert Total amount here -->
                        <div class="">
                            <!-- Insert Total amount here -->
                            <p id="total" class="mb-1 text-lg font-bold">
                               
                            </p>
                            DT
                            <p class="text-sm text-gray-700">
                                including VAT
                            </p>
                        </div>
                    </div>
                    <button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">
                        Check out
                    </button>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
<script>
    function incrementQuantity(itemId) {
        var counterInput = document.getElementById('counter-input-' + itemId);
        var currentValue = parseInt(counterInput.value);
        counterInput.value = currentValue + 1;
        validateQuantity(itemId);
    }

    function decrementQuantity(itemId) {
        var counterInput = document.getElementById('counter-input-' + itemId);
        var currentValue = parseInt(counterInput.value);
        if (currentValue > 1) {
            counterInput.value = currentValue - 1;
            validateQuantity(itemId);
        }
    }

    function validateQuantity(itemId) {
      
        var counterInput = document.getElementById('counter-input-' + itemId);
        var maxQuantity = document.getElementById('options-'+itemId).selectedOptions[0].getAttribute('data-max-quantity');
        var quantityError = document.getElementById('quantity-error-' + itemId);
       
        if (quantityError) {
            if (parseInt(counterInput.value) > parseInt(maxQuantity)) {
                quantityError.textContent="Max quantity is "+parseInt(maxQuantity);

            
            } else {
                quantityError.textContent="";
                updateTotalPrice(itemId, parseInt(counterInput.value));
            }
        }
    }
    function updateTotalPrice(itemId, quantity) {
    var itemPrice = parseFloat(document.getElementById('total-price-' + itemId).getAttribute('data-price'));
    var totalPrice = itemPrice * quantity;
    document.getElementById('total-price-' + itemId).textContent =totalPrice.toFixed(2);
    // Recalculate subtotal after updating total price
    calculateSubtotal();
}

    function calculateSubtotal() {
        var prices = document.querySelectorAll('.price-display');
        var subtotal = 0;
        prices.forEach(function (priceElement) {
            var priceText = priceElement.textContent.trim();
            var price = parseFloat(priceText.substring(priceText.indexOf('$') + 1));
            subtotal += price;
        });

        // Display subtotal in the UI
        var subtotalAmountElement = document.getElementById('subtotal-amount');
        subtotalAmountElement.textContent =subtotal.toFixed(2);


        var totalAmountElement = document.getElementById('total');
        totalAmountElement.textContent =subtotal.toFixed(2);
    }
    calculateSubtotal();
</script>
