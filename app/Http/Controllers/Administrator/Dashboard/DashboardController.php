<?php

namespace App\Http\Controllers\Administrator\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('administrator.dashboard.index');
    }
}