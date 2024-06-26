<?php

namespace App\Http\Controllers\Administrator\Destination;

use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class DestinationController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Destinasi',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Destinasi',
                    'is_active' => true
                ],
            ],
            'destination' => Destination::orderBy('name', 'asc')->get(),
        ];

        return view('administrator.destination.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Destinasi',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Destinasi',
                    'url' => route('apps.destination')
                ],
                [
                    'title' => 'Tambah Destinasi',
                    'is_active' => true
                ],
            ],
            'action' => route('apps.destination.store'),
        ];

        return view('administrator.destination.form', $data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $originalName = $file->getClientOriginalName();
                $filename = time() . '_' . str_replace(' ', '-', $originalName);
                $file->move(public_path('storage/images/destination'), $filename);
            }

            $destination = Destination::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $filename,
            ]);

            return redirect()->route('apps.destination')->with('success','Berhasil menambah data');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Gagal menambah data'. $e->getMessage());
        }

    }

    public function edit(Destination $destination)
    {
        $data = [
            'title' => 'Edit Destinsai',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Destinasi',
                    'url' => route('apps.destination')
                ],
                [
                    'title' => 'Tambah Destinasi',
                    'is_active' => true
                ],
            ],
            'destination' => $destination,
            'action' => route('apps.destination.update', $destination->hashid),
        ];

        return view('administrator.destination.form', $data);
    }

    public function update(Request $request, Destination $destination)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $originalName = $file->getClientOriginalName();
                $filename = time() . '_' . str_replace(' ', '-', $originalName);
                $file->move(public_path('storage/images/destination'), $filename);
                if ($destination->image !== 'default.png') {
                    File::delete(public_path('storage/images/destination/'. $destination->image));
                }
            } else {
                $filename = $destination->image;
            }

            $destination->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $filename,
            ]);

             return redirect()->route('apps.destination')->with('success','Berhasil mengedit data');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Gagal mengedit data'. $e->getMessage());
        }
    }

    public function delete(Destination $destination)
    {
        try {
            if ($destination->image !== 'default.png') {
                File::delete(public_path('storage/images/destination/'. $destination->image));
            }
            $destination->delete();

            return redirect()->route('apps.destination')->with('success','Berhasil menghapus data');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Gagal menghapus data'. $e->getMessage());
        }
    }
}
