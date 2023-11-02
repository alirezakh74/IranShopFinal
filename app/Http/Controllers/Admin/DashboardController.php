<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $brandNums = Brand::all()->count();
        return view('admin.dashboard', compact('brandNums'));
    }
}
