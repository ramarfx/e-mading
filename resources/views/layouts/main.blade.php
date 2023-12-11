<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://kit.fontawesome.com/2c2ad9e412.js" crossorigin="anonymous"></script>
  @vite('resources/css/app.css')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
</head>

<body>
  @include('partials.navbar')

  <div class="mt-[80px]">
    @yield('container')
  </div>

  <!-- Footer -->
  <footer class="bg-gray-900 py-6 text-white">
    <div class="container mx-auto px-4 text-center">
      <p>&copy; 2023 Mading Digital Sekolah. All rights reserved.</p>
    </div>
  </footer>

</body>

</html>
