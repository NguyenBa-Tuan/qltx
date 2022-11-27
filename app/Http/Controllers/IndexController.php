<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('brand')->paginate(3);
        return view('index', compact('vehicles'));
    }

    public function productDetail($id)
    {
        $vehicle = Vehicle::with('brand')->findOrFail($id);
        return view('product-detail', compact('vehicle'));
    }

    public function booking(Request $request, $id)
    {
        if (Auth::check()) {
            Booking::create([
                'user_id' => Auth::id(),
                'vehicles_id' => $id,
                'status' => '1',
                'from_data' => $request->from_data,
                'date_to' => $request->to_data,
            ]);
            return redirect()->back()->with('success', 'Thue xe thanh cong!');
        } else return redirect()->back()->with('error', 'You must login to rent car!');
    }
}
