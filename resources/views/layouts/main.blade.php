<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>e-mading</title>
  <link rel="icon" href="{{ asset('assets/img/mading.png') }}">
  <script src="https://kit.fontawesome.com/2c2ad9e412.js" crossorigin="anonymous"></script>
  @vite('resources/css/app.css')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  @yield('head')
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
</head>

<body>
  @include('components.navbar')

  <div class="mt-[80px]">
    @yield('container')
  </div>

@include('components.footer')

<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/period.js') }}"></script>
@yield('scripts')
</body>

</html>
