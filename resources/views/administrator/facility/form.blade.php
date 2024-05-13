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
                        <input type="text" class="form-control" name="name" placeholder="Masukan nama failitas..." value="{{ isset($facility) ? $facility->name : '' }}">
                    </div>
                    <div class="form-group">
                        <label>Jenis Fasilitas:</label>
                        <select class="form-control" name="type_of_facility_id">
                            <option selected disabled hidden>Pilih Jenis Fasilitas</option>
                            @foreach ($typeFacility as $item)
                                <option value="{{ $item->id }}"  {{ isset($facility) && $facility->type_of_facility_id == $item->id ?'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Foto</label>
                        <input type="file" class="form-control dropify" name="image">
                        @if(isset($facility) && $facility->image)
                        <span> <i>*Kosongkan form jika tidak ingin mengganti foto</i> </span> <br>
                        <img src="{{ asset('storage/images/facility/' . $facility->image) }}" alt="{{ $facility->image }}" class="img-fluid mb-2" style="max-width: 200px;">
                        @else
                        <span> <i>*Kosongkan form jika tidak ingin memasukan foto</i> </span> <br>
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
