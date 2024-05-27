@extends('administrator.layouts.app')

@section('wrapper')

<div class="row">
    <div class="col-md-6">
        <div class="card shadow-md">
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Jenis Pembayaran:</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukan jenis pembayaran..." value="{{ isset($typePayment) ? $typePayment->name : '' }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('apps.typePayment') }}" class="btn btn-outline-custom" style="margin-right: 10px">Kembali</a>
                        <button type="submit" class="btn btn-custom">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
