<?php

namespace App\Http\Controllers\Administrator\Galery;

use App\Models\Galery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class GaleryController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Galeri',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Galeri',
                    'is_active' => true
                ],
            ],
            'gallery' => Galery::orderBy('name', 'asc')->get(),
        ];

        return view('administrator.gallery.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Galeri',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Galeri',
                    'url' => route('apps.gallery')
                ],
                [
                    'title' => 'Tambah Galeri',
                    'is_active' => true
                ],
            ],
            'action' => route('apps.gallery.store'),
        ];

        return view('administrator.gallery.form', $data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $originalName = $file->getClientOriginalName();
                $filename = time() . '_' . str_replace(' ', '-', $originalName);
                $file->move(public_path('storage/images/gallery'), $filename);
            }

            $galery = Galery::create([
                'name' => $request->name,
                'image' => $filename,
            ]);

            toastr()->success('Berhasil menambahkan data!');
            return redirect()->route('apps.gallery');

        }catch(Exception $e){
            toastr()->success('Gagal menambahkan data!'. $e->getMessage());
            return redirect()->back();
        }

    }

    public function edit(Galery $galery)
    {
        $data = [
            'title' => 'Edit Galeri',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Galeri',
                    'url' => route('apps.gallery')
                ],
                [
                    'title' => 'Tambah Galeri',
                    'is_active' => true
                ],
            ],
            'gallery' => $galery,
            'action' => route('apps.gallery.update', $galery->hashid),
        ];

        return view('administrator.gallery.form', $data);
    }

    public function update(Request $request, Galery $galery)
    {
        try {
            $request->validate([
                'name' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $originalName = $file->getClientOriginalName();
                $filename = time() . '_' . str_replace(' ', '-', $originalName);
                $file->move(public_path('storage/images/gallery'), $filename);
                if ($galery->image !== 'default.png') {
                    File::delete(public_path('storage/images/gallery/'. $galery->image));
                }
            } else {
                $filename = $galery->image;
            }

            $galery->update([
                'name' => $request->name,
                'image' => $filename,
            ]);

            toastr()->success('Berhasil mengedit data!');
            return redirect()->route('apps.gallery');

        }catch(Exception $e){
            toastr()->success('Gagal mengedit data!'. $e->getMessage());
            return redirect()->back();
        }
    }

    public function delete(Galery $galery)
    {
        try {
            if ($galery->image !== 'default.png') {
                File::delete(public_path('storage/images/gallery/'. $galery->image));
            }
            $galery->delete();

            toastr()->success('Berhasil mengahapus data!');
            return redirect()->back();
        } catch (Exception $e) {
            toastr()->error('Gagal menghapus data: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
