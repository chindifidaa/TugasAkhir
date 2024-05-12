@extends('administrator.layouts.app')

@section('wrapper')

<div class="card shadow-md">
    <div class="card-body">
        <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama Kamar:</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukan nama kamar..." value="{{ isset($room) ? $room->name : '' }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Jumlah Kamar:</label>
                        <input type="number" class="form-control" name="stock" placeholder="Masukan jumlah..." value="{{ isset($room) ? $room->stock : '' }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Jenis Kamar:</label>
                        <select class="form-control" name="type_of_room_id">
                            <option selected disabled hidden>Pilih Jenis Kamar</option>
                            @foreach ($typeRooms as $item)
                                <option value="{{ $item->id }}"  {{ isset($room) && $room->type_of_room_id == $item->id ?'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label>Fasilitas:</label>
                <select class="form-control multiple-select" name="facility_id[]" multiple="multiple" placeholder="pilih fasilitas">
                    @foreach ($facilities as $item)
                        <option value="{{ $item->id }}" {{ isset($roomFacilities) && in_array($item->id, $roomFacilities) ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Foto</label>
                <input type="file" class="form-control dropify" name="image">
                @if(isset($room) && $room->image)
                <span> <i>*Kosongkan form jika tidak ingin mengganti foto</i> </span> <br>
                <img src="{{ asset('storage/images/rooms/' . $room->image) }}" alt="{{ $room->image }}" class="img-fluid mb-2" style="max-width: 200px;">
                @endif
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('apps.rooms') }}" class="btn btn-outline-custom" style="margin-right: 10px">Kembali</a>
                <button type="submit" class="btn btn-custom">Simpan</button>
            </div>
        </form>
    </div>
</div>


@endsection
