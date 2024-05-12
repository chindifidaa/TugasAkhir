<?php

namespace App\Http\Controllers\Administrator\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
                    'title' => 'Pengguna',
                    'is_active' => true
                ],
            ],
            'users' => User::orderBy('name', 'asc')->get(),
        ];



        return view('administrator.user.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Pengguna',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route("apps.dashboard")
                ],
                [
                    'title' => 'Pengguna',
                    'url' => route("apps.users")
                ],
                [
                    'title' => 'Tambah Pengguna',
                    'is_active' => true,
                ],
            ],
            'roles' => Role::get(),
            'action' => route("apps.users.store"),
        ];

        toastr()->success('Data has been saved successfully!');

        return view('administrator.user.form', $data);
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'role' => 'required',
            ]);

        } catch (Exception $e) {

        }


    }
}
