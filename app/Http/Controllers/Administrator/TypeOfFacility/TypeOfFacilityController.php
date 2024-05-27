<?php

namespace App\Http\Controllers\Administrator\TypeOfFacility;

use Illuminate\Http\Request;
use App\Models\TypeOfFacility;
use App\Http\Controllers\Controller;

class TypeOfFacilityController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Jenis Fasilitas',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Jenis Fasilitas',
                    'is_active' => true
                ],
            ],
            'typeFacility' => TypeOfFacility::orderBy('name', 'asc')->get(),
        ];

        return view('administrator.typeOfFacility.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Jenis Fasilitas',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Jenis Fasilitas',
                    'url' => route('apps.typeFacility')
                ],
                [
                    'title' => 'Tambah Jenis Fasilitas',
                    'is_active' => true
                ],
            ],
            'action' => route('apps.typeFacility.store'),
        ];
    
        return view('administrator.typeOfFacility.form', $data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
    
            TypeOfFacility::create([
                'name' => request()->name
            ]); 
    
            return redirect()->route('apps.typeFacility')->with('success','Berhasil menambah data');
        } catch (Exception $e) {
            return redirect()->back()->with('success','Gagal menambah data'. $e->getMessage());
        }
    }

    public function edit(TypeOfFacility $typeOfFacility)
    {
        $data = [
            'title' => 'Edit Jenis Fasilitas',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Jenis Fasilitas',
                    'url' => route('apps.typeFacility')
                ],
                [
                    'title' => 'Edit Jenis Fasilitas',
                    'is_active' => true
                ],
            ],
            'typeFacility' => $typeOfFacility,
            'action' => route('apps.typeFacility.update', $typeOfFacility->hashid),
        ];

        return view('administrator.typeOfFacility.form', $data);
    }

    public function update(TypeOfFacility $typeOfFacility, Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ],[
                'name.required' => 'Tipe Fasilitas wajib diiis'
            ]);

            $typeOfFacility->update([
                'name' => $request->name
            ]);

            return redirect()->route('apps.typeFacility')->with('success','Berhasil mengedit data');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Gagal mengedit data'. $e->getMessage());
        }
    }

    public function delete(TypeOfFacility $typeOfFacility) 
    {
        try {
            $typeOfFacility->delete();

           return redirect()->route('apps.typeFacility')->with('success','Berhasil menghapus data');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Gagal menghapus data'. $e->getMessage());
        }
    }
}
