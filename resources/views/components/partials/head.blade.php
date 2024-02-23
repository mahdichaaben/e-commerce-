<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{$appname}}</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="tailwindconfig.js"></script>
  <!-- Swiper CSS -->
<!-- // swiper cdn -->
<link
  rel="stylesheet"
         href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  @livewireStyles
@vite(['resources/css/app.css', 'resources/js/app.js'])