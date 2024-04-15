@extends('layouts.app')

@section('wrapper')

<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>{{ $title }}</h2>
                    <div class="bt-option">
                        <a href="{{ route('home')}}">Home</a>
                        <span>Galeri</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog-section blog-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="blog-item gallery-item set-bg" data-fancybox="gallery" data-setbg="{{ asset('assets/img/blog/blog-1.jpg')}}">
                    <div class="bi-text description">
                        <h4 class="title" style="color: #fff;">Tremblant In Canada</h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="blog-item gallery-item set-bg" data-fancybox="gallery" data-setbg="{{ asset('assets/img/blog/blog-1.jpg')}}">
                    <div class="bi-text description">
                        <h4 class="title" style="color: #fff;">Tremblant In Canada</h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="blog-item gallery-item set-bg" data-fancybox="gallery" data-setbg="{{ asset('assets/img/blog/blog-1.jpg')}}">
                    <div class="bi-text description">
                        <h4 class="title" style="color: #fff;">Tremblant In Canada</h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="blog-item gallery-item set-bg"  data-fancybox="gallery" data-setbg="{{ asset('assets/img/blog/blog-1.jpg')}}">
                    <div class="bi-text description">
                        <h4 class="title" style="color: #fff;">Tremblant In Canada</h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->


@endsection
