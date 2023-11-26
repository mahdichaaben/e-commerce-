@props(['products'])

<style>
  .cont_tel::-webkit-scrollbar {
    display: none;
  }

  .cont_tel {
    overflow-x: scroll;
    scroll-behavior: smooth;
  }
</style>

<section class="flex justify-center items-center relative">
  <div class="hidden absolute inset-y-0 z-10 -left-4 sm:flex items-center">
    <button onclick="pre()" class="bg-white -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
      <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6">
        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
      </svg>
    </button>
  </div>
  
  <div class="cont_tel flex gap-2" id="scroll">
    @foreach($products as $product)
      <div class="w-48">
        <x-article :product="$product" />
      </div>
    @endforeach
  </div>

  <div class="hidden absolute inset-y-0 -right-4 z-10 sm:flex items-center">
    <button onclick="sui()" class="bg-white -mr-2 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
      <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6">
        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
      </svg>
    </button>
  </div>
</section>

<script>
  function sui() {
    document.getElementById('scroll').scrollLeft += 500;
  }

  function pre() {
    document.getElementById('scroll').scrollLeft -= 500;
  }
</script>

{{-- 

<div class="absolute inset-y-0 left-0 z-10 flex items-center">
  <button @click="swiper.slidePrev()" 
          class="bg-white -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
    <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
  </button>
</div>





<div class="absolute inset-y-0 right-0 z-10 flex items-center">
  <button @click="swiper.slideNext()" 
          class="bg-white -mr-2 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
    <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
  </button> --}}