<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;


class AdminController extends Controller
{
    public function index()
    {
        $data = User::all()->where('role', 1);
        $courses = Course::all();
        return view('admin.home', compact('data', 'courses'));
    }
}
