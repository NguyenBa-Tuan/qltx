<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class VehicleCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $data = Vehicle::orderBy('id', 'desc')->paginate(4);
        $data = Vehicle::join('brands', 'vehicles.brand_id', '=', 'brands.id')
            ->select('vehicles.*', 'brands.name as brand_name')
            ->paginate(4);
        $data_brand = Brand::all();
        return view('admin.vehicle.vehicle', compact(['data', 'data_brand']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all()['brand_id']);
        $request->validate([
            'name' => 'required',
            'price_day' => 'required',
            'model_year' => 'required || integer',
            'seating_capacity' => 'required || integer',
            // 'license_plates' => 'exists:vehicles,license_plates',
            'fuel_type' => 'required',
            (int)$request->get('brand_id') => 'unique:brands,brand_id',
            'overview' => 'required',
            'image' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên xe',
            'price_day.required' => 'Vui lòng nhập giá xe',
            'model_year.required' => 'Vui lòng nhập năm sản xuất',
            'model_year.integer' => 'Vui lòng nhập năm sản xuất phải là số',
            'seating_capacity.required' => 'Vui lòng nhập số chỗ ngồi',
            'seating_capacity.integer' => 'Vui lòng nhập số chỗ ngồi phải là số',
            'license_plates.required' => 'Vui lòng nhập biển số xe',
            'fuel_type.required' => 'Vui lòng nhập loại nhiên liệu',
            'brand_id.unique' => 'Hãng xe không tồn tại',
            'overview.required' => 'Vui lòng nhập mô tả xe',
            'image.required' => 'Vui lòng nhập hình ảnh',
        ]);
        $date = $request->all();
        $vehicle = new Vehicle;
        $vehicle->name = $date['name'];
        $vehicle->price_day = $date['price_day'];
        $vehicle->model_year = $date['model_year'];
        $vehicle->seating_capacity = $date['seating_capacity'];
        $vehicle->license_plates = $date['license_plates'];
        $vehicle->fuel_type = $date['fuel_type'];
        $vehicle->brand_id = (int)$date['brand_id'];
        $vehicle->overview = $date['overview'];

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $vehicle['image'] = $filename;
        }
        
        $vehicle->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $vehicle = Vehicle::findOrFail($id);
        $data = $request->all();
        $vehicle->update($data);
        // dd($vehicle);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehicle::where('id', $id)->delete();
        return redirect()->back();
    }
}
