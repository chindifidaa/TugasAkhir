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
                        <span>Destinasi</span>
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
            <div class="col-lg-4 col-md-6">
                <div class="blog-item set-bg" data-setbg="{{ asset('assets/img/blog/blog-1.jpg')}}">
                    <div class="bi-text">
                        <span class="b-tag">Travel Trip</span>
                        <h4><a href="./blog-details.html">Tremblant In Canada</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-item set-bg" data-setbg="{{ asset('assets/img/blog/blog-2.jpg')}}">
                    <div class="bi-text">
                        <span class="b-tag">Camping</span>
                        <h4><a href="./blog-details.html">Choosing A Static Caravan</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-item set-bg" data-setbg="{{ asset('assets/img/blog/blog-3.jpg')}}">
                    <div class="bi-text">
                        <span class="b-tag">Event</span>
                        <h4><a href="./blog-details.html">Copper Canyon</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2019</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->


@endsection
