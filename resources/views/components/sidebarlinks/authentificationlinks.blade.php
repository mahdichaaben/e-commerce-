<div x-data="{ isActive: false, open: false }" x-cloak>
  <a href="#" @click.prevent="open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
    <span aria-hidden="true">

    </span>
    <span class="ml-2 text-sm">Dashboard</span>
    <span aria-hidden="true" class="ml-auto">
      <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </span>
  </a>
  <div x-show="open" @click.away="open = false" class="flex flex-col mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
<a href="/dashboard/categories">all categories</a>
<a href="/dashboard/products">all products</a>
</div>
</div>