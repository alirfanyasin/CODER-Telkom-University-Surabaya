<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description"
    content="Komunitas Kreatif dan Inovatif di Telkom University Surabaya yang Fokus pada Pengembangan Aplikasi dan Solusi Perangkat Lunak yang Inovatif.">
  <meta name="keywords"
    content="komunitas kreatif, inovatif, Telkom University, pengembangan aplikasi, solusi perangkat lunak, Coder Telkom Surabaya">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="canonical" href="https://coder-telkomsby.com/">
  <meta name="robots" content="index, follow">

  <!-- Open Graph Tags -->
  <meta property="og:title" content="Creativity On Digital Environment - Coder Telkom Surabaya">
  <meta property="og:description"
    content="Komunitas Kreatif dan Inovatif di Telkom University Surabaya yang Fokus pada Pengembangan Aplikasi dan Solusi Perangkat Lunak yang Inovatif.">
  <meta property="og:image" content="{{ asset('assets/images/logo/main-logo.png') }}">
  <meta property="og:url" content="https://coder-telkomsby.com/">
  <meta property="og:type" content="website">

  <!-- Twitter Card Tags -->
  <meta name="twitter:card" content="summary_large_image"> <!-- or 'summary' -->
  <meta name="twitter:title" content="Creativity On Digital Environment - Coder Telkom Surabaya">
  <meta name="twitter:description"
    content="Komunitas Kreatif dan Inovatif di Telkom University Surabaya yang Fokus pada Pengembangan Aplikasi dan Solusi Perangkat Lunak yang Inovatif.">
  <meta name="twitter:image" content="{{ asset('assets/images/logo/main-logo.png') }}">

  <link rel="icon" type="image/x-icon" href="assets/images/logo/logo.png">

  <title>{{ $title . ' | CODER' ?? 'CODER' }}</title>

  {{-- JQuery --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  { {{-- Vite --}}
  <link rel="stylesheet" href="/build/assets/app-BQOnPWkx.css">
  <script src="build/assets/app-DCgrAlrx.js"></script>
  @livewireStyles
</head>

<body class="bg-black">
  <main class="relative overflow-y-visible md:overflow-y-hidden">
    <img src="assets/images/shape/ellipse-2.png" alt="" class="absolute bottom-0 left-0 w-1/2">
    <img src="assets/images/shape/ellipse-1.png" alt="" class="absolute right-0 w-1/2 -top-60">
    {{ $slot }}
  </main>

  {{-- Iconify --}}
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
  @livewireScripts

  {{-- Livewire Alert --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <x-livewire-alert::scripts />

  @stack('js-custom')
</body>

</html>
