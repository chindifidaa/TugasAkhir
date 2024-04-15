<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Room',
        ];

        return view('room.index', $data);
    }

    public function detail()
    {
        $data = [
            'title' => 'Detail Room',
        ];

        return view('room.detail', $data);
    }

    public function payment()
    {
        $data = [
            'title' => 'Pembayaran',
        ];

        return view('payment.index', $data);
    }
}
