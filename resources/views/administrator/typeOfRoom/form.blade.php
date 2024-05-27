@extends('administrator.layouts.app')

@section('wrapper')

<div class="row">
    <div class="col-md-6">
        <div class="card shadow-md">
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukan jenis kmara..." value="{{ isset($typeRoom) ? $typeRoom->name : '' }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('apps.rooms') }}" class="btn btn-outline-custom" style="margin-right: 10px">Kembali</a>
                        <button type="submit" class="btn btn-custom">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
