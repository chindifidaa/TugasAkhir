@extends('administrator.layouts.app')

@section('wrapper')

<div class="card">
    <div class="card-body">
        <div class="card-title">
            <div class="row align-items-center">
                <div class="col-auto text-end ml-auto">
                    <a href="{{ route('apps.users.create')}}" class="btn btn-custom mx-auto"> <span class="bx bx-plus"></span> Tambah</a>
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
                        <th>Sebagai</th>
                        <th>Nomor</th>
                        <th>Alamat</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-3 d-none d-sm-block" style="width: 40px; height: 40px; border-radius: 50%;">
                                        <img src="{{ asset('storage/images/users/' . $item->image )}}" width="100%" alt="Profil">
                                    </div>
                                    <div class="pl-3">
                                        <strong>{{ ucfirst($item->name) }}</strong>
                                        <p class="m-0 p-0 text-muted">{{ $item->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{ ucfirst($item->role->name) }}</td>
                            <td>{{ $item->phone ?? '-'}}</td>
                            <td>{{ Str::limit($item->address, 30)  ?? '-' }}</td>
                            <td>
                                <div class="btn-group pull-right">
                                    @if ($item->role->name != 'Customer')
                                    <a href="" class="btn btn-sm" title="Edit">
                                        <span class="bx bx-edit-alt"> </span>
                                    </a>
                                    @endif
                                    <button class="btn btn-sm" title="Hapus">
                                        <span class="bx bx-trash-alt"> </span>
                                    </button>  
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
