@extends('administrator.layouts.base')

@section('app')
<!-- Wrapper Start -->
<div class="wrapper">

    @include('administrator.layouts.partials.sidebar')

    @include('administrator.layouts.partials.header')

    @yield('wrapper')
</div>
<!-- Wrapper END -->

<!-- Footer -->
<footer class="iq-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                </ul>
            </div>
            <div class="col-lg-6 text-right">
                Copyright 2020 <a href="#">FinDash</a> All Rights Reserved.
            </div>
        </div>
    </div>
</footer>
<!-- Footer END -->

@endsection
