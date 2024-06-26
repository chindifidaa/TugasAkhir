
@extends('administrator.layouts.app')

@section('wrapper')

<div class="card">
    <div class="card-body">
        <div class="card-title">
            <div class="row align-items-center">
                <div class="col-auto text-end ml-auto">
                    <a href="{{ route('apps.facility.create')}}" class="btn btn-custom mx-auto"> <span class="bx bx-plus"></span> Tambah</a>
                </div>
            </div>
        </div>
        <hr/>
        <div class="table-responsive">
            <table id="datatable" class="table nowrap table-striped table-center table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 5%">No.</th>
                        <th>Nama</th>
                        <th>Jenis Fasilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facility as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->typeOfFacility->name }}</td>
                            <td>
                                <div class="btn-group pull-right">
                                    <a href="{{ route('apps.facility.edit', $item)}}" class="btn btn-sm" title="Edit">
                                        <span class="bx bx-edit-alt"> </span>
                                    </a>
                                    <a href="{{ route('apps.facility.delete', $item)}}" class="btn btn-sm" title="Hapus">
                                        <span class="bx bx-trash-alt"> </span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
