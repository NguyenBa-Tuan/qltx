<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $data = User::all()->where('role', 1);
        // $courses = Course::all();
        return view('admin.home', compact('data', 'courses'));
    }

    public function bookingHistory()
    {
        $data = DB::table('bookings')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->join('vehicles', 'vehicles.id', '=', 'bookings.vehicles_id')
            ->select('bookings.*', 'users.name as user_name', 'vehicles.name as vehicles_name', 'vehicles.license_plates')
            ->where('status', '!=', 0)
            ->get();
        return view('admin.history', compact('data'));
    }

    public function requestRentForm()
    {
        $data = DB::table('bookings')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->join('vehicles', 'vehicles.id', '=', 'bookings.vehicles_id')
            ->select('bookings.*', 'users.name as user_name', 'vehicles.name as vehicles_name', 'vehicles.license_plates')
            ->where('status', 0)
            ->get();
        return view('admin.request', compact('data'));
    }

    public function requestRent(Request $request, $id)
    {
        $update = Booking::findOrFail($id);
        $update->status = $request->status;
        $update->save();
        return redirect()->back()->with('success', 'Success');
    }
}
