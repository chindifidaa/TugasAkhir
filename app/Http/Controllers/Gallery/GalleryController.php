<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Galeri',
        ];

        return view('gallery.index', $data);
    }
}
