<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function bookingHistory()
    {
        $data = DB::table('bookings')
            ->join('vehicles', 'bookings.vehicles_id', '=', 'vehicles.id')
            ->select('bookings.*', 'vehicles.name as vehicles_name')
            ->where('user_id', Auth::id())->get();
        return view('history', compact('data'));
    }
}
