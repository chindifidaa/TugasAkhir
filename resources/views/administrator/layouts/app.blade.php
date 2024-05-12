@extends('administrator.layouts.base')

@section('app')
<!-- Wrapper Start -->
@include('administrator.layouts.partials.sidebar')

@include('administrator.layouts.partials.header')

<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">{{ $title ?? 'Unknown' }}</div>
                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        @if (isset($breadcrumbs))
                        <ol class="breadcrumb mb-0 p-0">
                            @foreach ($breadcrumbs as $item)
                                @if (isset($item['is_active']) && $item['is_active'])
                                <li class="breadcrumb-item active" aria-current="page">{{ $item['title'] }}</li>
                                @else
                                <li class="breadcrumb-item"><a href="{{ $item['url'] }}">{{ $item['title'] }}</a></li>
                                @endif
                            @endforeach
                        </ol>
                        @endif
                    </nav>
                </div>
            </div>

            @yield('wrapper')
        </div>
    </div>

    <!--start overlay-->
</div>
<div class="overlay toggle-btn-mobile"></div>
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<div class="footer">
    <p class="mb-0">Copyright © <script> document.write(new Date().getFullYear()); </script>. Pesona Java Ijen Homestay.</p>
</div>

<!-- Wrapper END -->


@endsection
