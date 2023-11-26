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

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="css/swiper-bundle.min.css" />
  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css" />
  @livewireStyles
@vite(['resources/css/app.css', 'resources/js/app.js'])