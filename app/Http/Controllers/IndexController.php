<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $list_car = Vehicle::all();
        if (!$request->input()) {
            $vehicles = Vehicle::with('brand')->paginate(3);
            return view('index', compact('vehicles', 'list_car'));
        } else {
            $price_from = $request->price_from ?? 0;
            $price_to = $request->price_to ?? Vehicle::max('price_day');

            $vehicles = Vehicle::when([$price_from, $price_to], function ($query) use ($price_from, $price_to) {
                return $query->whereBetween('price_day', [$price_from, $price_to]);
            })->when($request->name, function ($query) use ($request) {
                return $query->where('name', 'LIKE',  "%{$request->name}%");
            }, function ($query) {
                return $query;
            })->paginate(3);
            return view('index', compact('vehicles', 'list_car'));
        }
    }

    public function productDetail($id)
    {
        $vehicle = Vehicle::with('brand')->findOrFail($id);
        return view('product-detail', compact('vehicle'));
    }

    public function booking(Request $request, $id)
    {
        if (Auth::check()) {
            $price = Vehicle::find($id)->price_day;
            Booking::create([
                'user_id' => Auth::id(),
                'vehicles_id' => $id,
                'status' => '0',
                'from_data' => $request->from_data,
                'to_data' => $request->to_data,
                'price' => $price,
            ]);
            return redirect()->back()->with('success', 'Thue xe thanh cong!');
        } else return redirect()->back()->with('error', 'You must login to rent car!');
    }
}
