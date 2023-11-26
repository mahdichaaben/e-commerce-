@props(['product'])
<div   class="bg-white shadow flex flex-col justify-between h-full rounded overflow-hidden group transition duration-300 ease-in-out transform hover:-translate-y-1">
    
    <div class="relative h-1/2">
        @if ($product->images()->count() > 0)
        <img src="{{ Storage::url($product->images()->first()->slug) }}" alt="product 1" class="w-full object-cover h-full">
    @else
        <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="product 1" class="w-full object-cover h-full">
    @endif
    </div>
    <div class="pt-4 pb-3 px-4">
        <a href="{{ route('product.index', ['product' => $product->slug]) }}">
            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                {{ $product->name }}</h4>
        </a>
        <div class="flex items-baseline mb-1 space-x-2">
            <p class="text-xl text-primary font-semibold">${{ $product->price }}</p>
            <p class="text-sm text-gray-400 line-through">${{ $product->discount_price }}</p>
        </div>
    </div>

    <a href="#" class="block w-full py-1 text-center text-white bg-gray-900 border border-gray-900 rounded-b hover:bg-transparent hover:text-gray-900 transition">Add to cart</a>
</div>








{{-- 
<div class="w-full">
    <div class="w-full relative group">
        <div class="max-w-80 max-h-80 relative overflow-y-hidden ">
            <div><img class="w-full h-full" src="/images/illustration-2.png"></div>
            <div class="absolute top-6 left-8">
                <div class="bg-primeColor w-[92px] h-[35px] text-white flex justify-center items-center text-base font-semibold hover:bg-black duration-300 cursor-pointer">New</div>
            </div>
            <div class="w-full h-32 absolute bg-white -bottom-[130px] group-hover:bottom-0 duration-700">
                <ul class="w-full h-full flex flex-col items-end justify-center gap-2 font-titleFont px-2 border-l border-r">
                    <li class="text-[#767676] hover:text-primeColor text-sm font-normal border-b-[1px] border-b-gray-200 hover:border-b-primeColor flex items-center justify-end gap-2 hover:cursor-pointer pb-1 duration-300 w-full">Compare<span><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.828 18.256l-.002.015c249.642 36.995 371.904 169.983 397.32 278.01-2.094 5.977-4.496 11.044-7.068 14.968-17.29 26.383-62.522 40.075-101.654 28.596 5.984-19.75 10.132-39.834 12.07-59.12-95.46 8.177-212.544 8.42-301.207-22.642 41.727 95.317 99.325 164.465 164.983 230.08 18.296-2.164 35.807-11.35 51.837-25.37 85.218 34.667 188.066-2.555 226.748-60.68 46.922-70.5 74.07-317.52-167.462-383.856H232.81c160.326 54.874 195.73 167.74 191.573 239.03-37.15-93.627-137.68-191.855-312.38-239.03H19.83z"></path>
                            </svg></span></li>
                    <li class="text-[#767676] hover:text-primeColor text-sm font-normal border-b-[1px] border-b-gray-200 hover:border-b-primeColor flex items-center justify-end gap-2 hover:cursor-pointer pb-1 duration-300 w-full">Add to Cart<span><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"></path>
                            </svg></span></li>
                    <li class="text-[#767676] hover:text-primeColor text-sm font-normal border-b-[1px] border-b-gray-200 hover:border-b-primeColor flex items-center justify-end gap-2 hover:cursor-pointer pb-1 duration-300 w-full">View Details<span class="text-lg"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path fill="none" d="M0 0h24v24H0V0z"></path>
                                <path d="M4 18.99h11c.67 0 1.27-.32 1.63-.83L21 12l-4.37-6.16C16.27 5.33 15.67 5 15 5H4l5 7-5 6.99z"></path>
                            </svg></span></li>
                    <li class="text-[#767676] hover:text-primeColor text-sm font-normal border-b-[1px] border-b-gray-200 hover:border-b-primeColor flex items-center justify-end gap-2 hover:cursor-pointer pb-1 duration-300 w-full">Add to Wish List<span><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                            </svg></span></li>
                </ul>
            </div>
        </div>
        <div class="max-w-80 py-6 flex flex-col gap-1 border-[1px] border-t-0 px-4">
            <div class="flex items-center justify-between font-titleFont">
                <h2 class="text-lg text-primeColor font-bold">Smart Watch</h2>
                <p class="text-[#767676] text-[14px]">$250.00</p>
            </div>
            <div>
                <p class="text-[#767676] text-[14px]">Black</p>
            </div>
        </div>
    </div>
</div> --}}