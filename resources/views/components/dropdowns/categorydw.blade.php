<div>
  <x-secondary-button id="multiLevelDropdownButton">
    Category parent
    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
    </svg>
  </x-secondary-button>

  <!-- Dropdown menu -->
 


<script>
  function storeID(id) {
    // Use session storage
    sessionStorage.setItem('selectedID', id);

    // Use local storage
    // localStorage.setItem('selectedID', id);
  }

  // Dropdown toggle logic
  const dropdownButton = document.getElementById('multiLevelDropdownButton');
  const dropdownMenu = document.getElementById('dropdown');

  dropdownButton.addEventListener('click', () => {
    const isHidden = dropdownMenu.classList.contains('hidden');
    dropdownMenu.classList.toggle('hidden', !isHidden);
  });
</script>
