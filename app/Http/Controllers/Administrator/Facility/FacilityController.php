<?php

namespace App\Http\Controllers\Administrator\Facility;

use App\Models\Facility;
use App\Models\TypeOfFacility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class FacilityController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Fasilitas',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Fasilitas',
                    'is_active' => true
                ],
            ],
            'facility' => Facility::orderBy('name', 'asc')->get(),
        ];

        return view('administrator.facility.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Fasilias',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Fasilitas',
                    'url' => route('apps.facility')
                ],
                [
                    'title' => 'Tambah Fasilitas',
                    'is_active' => true
                ],
            ],
            'typeFacility' => TypeOfFacility::orderBy('name', 'asc')->get(),
            'action' => route('apps.facility.store'),
        ];

        return view('administrator.facility.form', $data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'type_of_facility_id' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $originalName = $file->getClientOriginalName();
                $filename = time() . '_' . str_replace(' ', '-', $originalName);
                $file->move(public_path('storage/images/facility'), $filename);
            }

            $facility = Facility::create([
                'name' => $request->name,
                'type_of_facility_id' => $request->type_of_facility_id,
                'image' => $filename,
            ]);

            return redirect()->route('apps.fcility')->with('success','Berhasil menambah data');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Gagal menambah data'. $e->getMessage());
        }

    }

    public function edit(Facility $facility)
    {
        $data = [
            'title' => 'Edit Fasilias',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Fasilitas',
                    'url' => route('apps.facility')
                ],
                [
                    'title' => 'Tambah Fasilitas',
                    'is_active' => true
                ],
            ],
            'typeFacility' => TypeOfFacility::orderBy('name', 'asc')->get(),
            'action' => route('apps.facility.update', $facility->hashid),
            'facility' => $facility,
        ];

        return view('administrator.facility.form', $data);
    }

    public function update(Request $request, Facility $facility)
    {
        try {
            $request->validate([
                'name' => 'required',
                'type_of_facility_id' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $originalName = $file->getClientOriginalName();
                $filename = time() . '_' . str_replace(' ', '-', $originalName);
                $file->move(public_path('storage/images/facility'), $filename);
                if ($facility->image !== 'default.png') {
                    File::delete(public_path('storage/images/facility/'. $facility->image));
                }
            } else {
                $filename = $facility->image;
            }

            $facility->update([
                'name' => $request->name,
                'type_of_facility_id' => $request->type_of_facility_id,
                'image' => $filename,
            ]);

             return redirect()->route('apps.facility')->with('success','Berhasil mengedit data');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Gagal mengedit data'. $e->getMessage());
        }
    }

    public function delete(Facility $facility)
    {
        try {
            if ($facility->image !== 'default.png') {
                File::delete(public_path('storage/images/facility/'. $facility->image));
            }
            $facility->delete();

             return redirect()->route('apps.facility')->with('success','Berhasil menghapus data');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Gagal menghapus data'. $e->getMessage());
        }
    }
}
