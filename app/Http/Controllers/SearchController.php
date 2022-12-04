<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->input('search'));
        if ($request->search == null) return redirect()->route('index');
        else {
            $data = Vehicle::where('name', 'LIKE', '%' . $request->search . '%')->get();
            return view('result', compact('data'));
        }
    }
}
