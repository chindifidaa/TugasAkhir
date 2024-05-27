<?php

namespace App\Http\Controllers\Administrator\TypeOfRoom;

use App\Models\TypeOfRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeOfRoomController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Jenis Kamar',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Jenis Kamar',
                    'is_active' => true
                ],
            ],
            'typeRoom' => TypeOfRoom::orderBy('name', 'asc')->get(),
        ];

        return view('administrator.typeOfRoom.index', $data);
    }
    
    public function create()
    {
        $data = [
            'title' => 'Tambah Jenis Kamar',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Jenis Kamar',
                    'url' => route('apps.typeRoom')
                ],
                [
                    'title' => 'Tambah Jenis Kamar',
                    'is_active' => true
                ],
            ],
            'action' => route('apps.typeRoom.store'),
        ];
    
        return view('administrator.typeOfRoom.form', $data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
    
            TypeOfRoom::create([
                'name' => request()->name
            ]); 
    
            return redirect()->route('apps.typeRoom')->with('success','Berhasil menambah data');
        } catch (Exception $e) {
            return redirect()->back()->with('success','Gagal menambah data'. $e->getMessage());
        }
    }

    public function edit(TypeOfRoom $typeOfRoom)
    {
        $data = [
            'title' => 'Edit Jenis Kamar',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Jenis Kamar',
                    'url' => route('apps.typeRoom')
                ],
                [
                    'title' => 'Edit Jenis Kamar',
                    'is_active' => true
                ],
            ],
            'typeRoom' => $typeOfRoom,
            'action' => route('apps.typeRoom.update', $typeOfRoom->hashid),
        ];

        return view('administrator.typeOfRoom.form', $data);
    }

    public function update(TypeOfRoom $typeOfRoom, Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ],[
                'name.required' => 'Nama kamar wajib diiis'
            ]);

            $typeOfRoom->update([
                'name' => $request->name
            ]);

            return redirect()->route('apps.typeRoom')->with('success','Berhasil menambah data');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Gagal menambah data'. $e->getMessage());
        }
    }

    public function delete(TypeOfRoom $typeOfRoom) 
    {
        try {
            $typeOfRoom->delete();

           return redirect()->route('apps.typeRoom')->with('success','Berhasil menghapus data');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Gagal menghapus data'. $e->getMessage());
        }
    }
}
