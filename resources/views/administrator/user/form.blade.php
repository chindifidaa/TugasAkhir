@extends('administrator.layouts.app')

@section('wrapper')

<div class="card shadow-md">
    <div class="card-body">
        <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukan nama...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukan email...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Sebagai:</label>
                        <select class="form-control">
                            <option selected disabled hidden>Pilih peran</option>
                            @foreach ($roles as $item)
                                <option value="{{ $item->id }}"  {{ isset($user) && $user->role == $item->id ?'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
