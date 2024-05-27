<?php

namespace App\Http\Controllers\Administrator\TypeOfPayment;

use App\Models\TypePayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeOfPaymentController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Jenis Pembayaran',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Jenis Pembayaran',
                    'is_active' => true
                ],
            ],
            'typePayment' => TypePayment::orderBy('name', 'asc')->get(),
        ];

        return view('administrator.typeOfPayment.index', $data);
    }
    
    public function create()
    {
        $data = [
            'title' => 'Tambah Jenis Pembayaran',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Jenis Pembayaran',
                    'url' => route('apps.typePayment')
                ],
                [
                    'title' => 'Tambah Jenis Pembayaran',
                    'is_active' => true
                ],
            ],
            'action' => route('apps.typePayment.store')
        ];
    
        return view('administrator.typeOfPayment.form', $data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required'
            ]);

            TypePayment::create([
                'name' => $request->name
            ]);

            return redirect()->route('apps.typePayment')->with('success', 'Berhasil menambah data');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambah data'. $e->getMessage());
        }
    }

    public function edit(TypePayment $typePayment)
    {
          $data = [
            'title' => 'Edit Jenis Pembayaran',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Jenis Pembayaran',
                    'url' => route('apps.typePayment')
                ],
                [
                    'title' => 'Edit Jenis Pembayaran',
                    'is_active' => true
                ],
            ],
            'typePayment' => $typePayment,
            'action' => route('apps.typePayment.update', $typePayment->hashid)
        ];
    
        return view('administrator.typeOfPayment.form', $data); 
    }

    public function update(TypePayment $typePayment, Request $request)
    {
        try {
            $request->validate([
                'name' => 'required'
            ]);

            $typePayment->update([
                'name' => $request->name
            ]);

            return redirect()->route('apps.typePayment')->with('success', 'Berhasil mengedit data');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengedit data'. $e->getMessage());
        }
    }
    public function delete(TypePayment $typePayment)
    {
        try {
            $typePayment->delete();

            return redirect()->route('apps.typePayment')->with('success', 'Berhasil menghapus data');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data'. $e->getMessage());
        }
    }
}
