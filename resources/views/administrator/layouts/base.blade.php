<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>{{ $title ?? '' }} - Pesona Java Ijen Homestay</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('main-assets/image/logo/icon.png')}}" />

      @include('administrator.layouts.partials.style')
      @stack('styles')
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->

      @yield('app')


      @include('administrator.layouts.partials.script')
      @stack('scripts')
   </body>
</html>
