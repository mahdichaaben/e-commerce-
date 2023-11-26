<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <x-partials.head>
    <x-slot name="appname">
      {{$appname}}
    </x-slot>
  </x-partials.head>
</head>

<body style="font-family: Open Sans, sans-serif" class="bg-gray-100">
    <x-partials.navAndSlide>
      <x-slot name="content">
        {{$slot}}
      </x-slot>
    </x-partials.navAndSlide>
    @livewireScripts
</body>

</html>