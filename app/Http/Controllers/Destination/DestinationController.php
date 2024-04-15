<?php

namespace App\Http\Controllers\Destination;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Destinasi Wisata',
        ];

        return view('destination.index', $data);
    }
}
