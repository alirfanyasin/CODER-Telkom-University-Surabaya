<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

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
  {{-- Slick --}}
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

  {{-- Vite --}}
  <link rel="stylesheet" href="/build/assets/app-BQOnPWkx.css">
  <script src="build/assets/app-DCgrAlrx.js"></script>
  @livewireStyles
</head>

<body class="overflow-x-hidden bg-black">
  @livewire('components.navbar')
  <main class="overflow-x-hidden">
    {{ $slot }}
  </main>
  @livewire('components.footer')


  {{-- Iconify --}}
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
  {{-- Slick --}}
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  @livewireScripts

  @stack('js-custom')

</body>

</html>
