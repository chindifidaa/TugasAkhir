@extends('layouts.base')

@section('app')

@include('layouts.partials.mobile-view')

@include('layouts.partials.header')


    @yield('wrapper')

@include('layouts.partials.footer')

@endsection
