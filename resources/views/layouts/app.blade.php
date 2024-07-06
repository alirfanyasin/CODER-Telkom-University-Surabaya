<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{ $title . ' | CODER' ?? 'CODER' }}</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>

<body>
  <main>
    {{ $slot }}
  </main>

  {{-- Iconify --}}
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
  @livewireScripts
</body>

</html>
