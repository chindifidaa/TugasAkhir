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
                        <a href="{{ route('rooms')}}">Room</a>
                        <a href="{{ route('detail.rooms')}}">Detail Room</a>
                        <span>Pembayaran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<div class="container">
    <form action="">
        <div class="row mb-5 d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card border-1 shadow-sm">
                    <div class="card-body">
                        <h4 class="mb-3">Transfer Pembayaran</h4>
                        <div class=" mb-3 alert alert-primary alert-dismissible fade show" role="alert">
                            <i class="fa fa-exclamation-circle mr-2" aria-hidden="true"></i>
                            Silahkan memilih bank untuk melakukan transfer.
                        </div>

                        <h5 class="mb-2">Bank</h5>
                        <div class="list-bank mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                            id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            BCA ( BANK CENTRAL ASIA )
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                            id="exampleRadios1" value="option1">
                                        <label class="form-check-label" for="exampleRadios1">
                                            MANDIRI
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="mb-2">Dompet Digital</h5>
                        <div class="list-bank mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                            id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            DANA
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="item-description">
                            <h5 class="mb-3">Rincian Harga</h5>
                            <p><strong>Pastikan Nominal Sudah Sesuai Sebelum Melanjutkan.</strong></p>
                            <button class="btn btn-single">Bayar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
