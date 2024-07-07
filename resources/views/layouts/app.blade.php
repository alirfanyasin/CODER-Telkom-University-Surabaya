<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="assets/images/logo/logo.png">

  <title>{{ $title . ' | CODER' ?? 'CODER' }}</title>

  {{-- JQuery --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  {{-- Vite --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>

<body class="h-screen overflow-y-hidden bg-black">

  <div class="flex">
    @livewire('components.sidebar')
    <main class="relative h-screen overflow-y-auto basis-9/12">
      <div class="container px-8">
        <div class="w-full mx-auto">
          @livewire('components.navbar-app')
          {{ $slot }}
        </div>
      </div>
    </main>
  </div>
  <img src="assets/images/shape/object-5.png" alt="" class="absolute right-0 w-1/3 top-10 -z-20">


  {{-- Iconify --}}
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
  @livewireScripts

  @stack('js-custom')
</body>

</html>
