<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('components.partials.head')
</head>

<body style="font-family: Open Sans, sans-serif" class="">


<div class="flex flex-col h-screen overflow-y-hidden ">
  @include('navbar.navbar')
  <main class="flex-1  max-h-full overflow-hidden overflow-y-scroll box-border">
    {{$slot}}
  </main>

</div>

{{-- 
      <x-slot name="content">
        {{$slot}}
      </x-slot> --}}
    </div>
    @livewireScripts
</body>

<script>
 
</script>



</html>