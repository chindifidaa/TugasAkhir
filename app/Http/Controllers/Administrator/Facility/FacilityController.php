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

            toastr()->success('Berhasil menambahkan data!');
            return redirect()->route('apps.facility');
        }catch(Exception $e){
            toastr()->success('Gagal menambahkan data!'. $e->getMessage());
            return redirect()->back();
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

            toastr()->success('Berhasil mengedit data!');
            return redirect()->route('apps.facility');
        }catch(Exception $e){
            toastr()->success('Gagal mengedit data!'. $e->getMessage());
            return redirect()->back();
        }
    }

    public function delete(Facility $facility)
    {
        try {
            if ($facility->image !== 'default.png') {
                File::delete(public_path('storage/images/facility/'. $facility->image));
            }
            $facility->delete();

            toastr()->success('Berhasil mengahapus data!');
            return redirect()->back();
        } catch (Exception $e) {
            toastr()->error('Gagal menghapus data: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
