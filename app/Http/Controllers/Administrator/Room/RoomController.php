<?php

namespace App\Http\Controllers\Administrator\Room;

use App\Models\Room;
use App\Models\Facility;
use App\Models\TypeOfRoom;
use App\Models\FacilityRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;

class RoomController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Pengguna',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Kamar',
                    'is_active' => true
                ],
            ],
            'rooms' => Room::orderBy('name', 'asc')->get(),
        ];

        return view('administrator.room.index', $data);
    }

    public function create()
    {

        $facilities = Facility::whereHas('typeOfFacility', function($query) {
            $query->where('name', 'Fasilitas Kamar');
        })->orderBy('name', 'asc')->get();

        $data = [
            'title' => 'Tambah Kamar',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Kamar',
                    'url' => route('apps.rooms')
                ],
                [
                    'title' => 'Tambah Kamar',
                    'is_active' => true
                ],
            ],
            'facilities' => $facilities,
            'typeRooms' => TypeOfRoom::orderBy('name', 'asc')->get(),
            'action' => route('apps.rooms.store'),
        ];

        return view('administrator.room.form', $data);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'name' => 'required',
                'type_of_room_id' => 'required',
                'stock' => 'required',
                'facility_id' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $originalName = $file->getClientOriginalName();
                $filename = time() . '_' . str_replace(' ', '-', $originalName); // Mengganti spasi dengan tanda strip (-)
                $file->move(public_path('storage/images/rooms'), $filename);
            }

            $room = Room::create([
                'name' => $request->name,
                'type_of_room_id' => $request->type_of_room_id,
                'stock' => $request->stock,
                'image' => $filename ,
            ]);

            foreach($request->facility_id as $key => $id) {
                $facilityRoom = FacilityRoom::create([
                    'room_id' => $room->id,
                    'facility_id' => $id,

                ]);
            }


            DB::commit();
            toastr()->success('Berhasil menambahkan data!');
            return redirect()->route('apps.rooms');
        } catch (Exception $e) {
            toastr()->error('Berhasil menambahkan data!' . $e->getMessage());
            return redirect()->route('apps.rooms');
        }
    }

    public function edit(Room $room)
    {
        $facilities = Facility::whereHas('typeOfFacility', function($query) {
            $query->where('name', 'Fasilitas Kamar');
        })->orderBy('name', 'asc')->get();
        $roomFacilities = FacilityRoom::where('room_id', $room->id)->pluck('facility_id')->toArray();

        $data = [
            'title' => 'Tambah Kamar',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard')
                ],
                [
                    'title' => 'Kamar',
                    'url' => route('apps.rooms')
                ],
                [
                    'title' => 'Edit Kamar',
                    'is_active' => true
                ],
            ],
            'facilities' => $facilities,
            'typeRooms' => TypeOfRoom::orderBy('name', 'asc')->get(),
            'action' => route('apps.rooms.update', $room->hashid),
            'room' => $room,
            'roomFacilities' => $roomFacilities,

        ];

        return view('administrator.room.form', $data);
    }

    public function update(Request $request, Room $room)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required',
                'type_of_room_id' => 'required',
                'stock' => 'required',
                'facility_id' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $filename = $room->image;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $originalName = $file->getClientOriginalName();
                $filename = time() . '_' . str_replace(' ', '-', $originalName);
                $file->move(public_path('storage/images/rooms'), $filename);
                if ($room->image) {
                    unlink(public_path('storage/images/rooms/' . $room->image));
                }
            }

            $room->update([
                'name' => $request->name,
                'type_of_room_id' => $request->type_of_room_id,
                'stock' => $request->stock,
                'image' => $filename,
            ]);

            $room->facilities()->detach();

            foreach($request->facility_id as $key => $id) {
                $facilityRoom = FacilityRoom::create([
                    'room_id' => $room->id,
                    'facility_id' => $id,
                ]);
            }

            DB::commit();
            toastr()->success('Berhasil memperbarui data!');
            return redirect()->route('apps.rooms');
        } catch (Exception $e) {
            DB::rollback();
            toastr()->error('Gagal memperbarui data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function delete(Room $room)
    {
        try {
            if ($room->image !== 'default.png') {
                File::delete(public_path('storage/images/rooms/'. $room->image));
            }
            $room->delete();

            toastr()->success('Berhasil mengahapus data!');
            return redirect()->back();
        } catch (Exception $e) {
            toastr()->error('Gagal menghapus data: ' . $e->getMessage());
            return redirect()->back();
        }
    }


}
