
<style>
    .cont_tel::-webkit-scrollbar {
      display: none;
    }
  
    .cont_tel {
      overflow-x: scroll;
      scroll-behavior: smooth;
    }
  </style>
<section class="flex w-full h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96 justify-center items-center relative">
    <div class="absolute hidden inset-y-0 z-10 left-4 sm:flex items-center">
      <button onclick="prev()" class=" flex justify-center items-center rounded-full shadow focus:outline-none">
        <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6">
          <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
    
    <div class="cont_tel scroll  flex " id="scroll_">
        <img src="/images/téléchargement.jpeg" class=" h-[80vh]" alt="banner">
        <img src="/images/téléchargement.jpeg" class=" h-[80vh]" alt="banner">
        <img src="/images/téléchargement.jpeg" class=" h-[80vh]" alt="banner">
  
    </div>
  
    <div class="absolute hidden inset-y-0 z-10 right-4 sm:flex items-center">
      <button onclick="suiv()" class=" flex justify-center items-center rounded-full shadow focus:outline-none">
        <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6">
          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
  </section>
  
  <script>
    function suiv() {
      document.getElementById('scroll_').scrollLeft +=window.innerWidth;
    }
  
    function prev() {
      document.getElementById('scroll_').scrollLeft -=window.innerWidth;
   } 

     // Function for auto-scrolling every 6 seconds
  function autoScroll() {
    setInterval(() => {
     let v= document.getElementById('scroll_').scrollLeft +=window.innerWidth;
    }, 8000);
  }

  // Call the autoScroll function when the page loads
  window.onload = function () {
    autoScroll();
  };
  </script>
  