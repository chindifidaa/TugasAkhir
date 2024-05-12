@extends('administrator.layouts.app')

@section('wrapper')

<div class="row">
    <div class="col-md-6">
        <div class="card shadow-md">
            <div class="card-body">
                <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Foto:</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukan nama foto..." value="{{ isset($gallery) ? $gallery->name : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Foto</label>
                        <input type="file" class="form-control dropify" name="image">
                        @if(isset($gallery) && $gallery->image)
                        <span> <i>*Kosongkan form jika tidak ingin mengganti foto</i> </span> <br>
                        <img src="{{ asset('storage/images/gallery/' . $gallery->image) }}" alt="{{ $gallery->image }}" class="img-fluid mb-2" style="max-width: 200px;">
                        @endif
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('apps.gallery') }}" class="btn btn-outline-custom" style="margin-right: 10px">Kembali</a>
                        <button type="submit" class="btn btn-custom">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
