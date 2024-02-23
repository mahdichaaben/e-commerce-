<section class="w-full max-h-[40vh]">
<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    @foreach($products as $product)
    <div class="swiper-slide ">
      <x-article :product="$product" />
    </div>
    @endforeach 
  </div>
  <!-- If we need pagination -->


  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- If we need scrollbar -->
  
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  const swiper = new Swiper('.swiper', {
// Optional parameters
slidesPerView: 4,
loop: true,
breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 40,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 40,
          },
          1024: {
            slidesPerView: 5,
            spaceBetween: 50,
          },
        },

// If we need pagination
pagination: {
  el: '.swiper-pagination',
},



// Navigation arrows
navigation: {
  nextEl: '.swiper-button-next',
  prevEl: '.swiper-button-prev',
},

// And if we need scrollbar
scrollbar: {
  el: '.swiper-scrollbar',
},
});
</script>

</section>



{{-- @foreach($products as $product)
<div class="swiper-slide">
  <x-article :product="$product" />
</div>
@endforeach --}}