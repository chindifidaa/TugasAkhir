<!doctype html>
<html lang="en" class="ColorLessIcons">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? '' }} - Pesona Java Ijen Homestay</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/icon.png')}}">

    @include('administrator.layouts.partials.style')
    @stack('styles')
</head>
<body>

    <div class="wrapper">
        @yield('app')

    </div>
    @include('administrator.layouts.partials.script')
    @stack('scripts')
</body>
</html>
