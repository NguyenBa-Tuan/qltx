<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::orderBy('id', 'desc')->paginate(4);
        // dd($data);
        return view('admin.brand.brand', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required || unique:brands,name',
        ],[
            'name.required' => 'Yêu cầu tồn tại giá trị nhập',
            'name.unique' => 'Hãng xe đã tồn tại',
        ]);

        $brand = new Brand;
        $brand->name = $request->name;
        $brand->save();
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
        $request->validate([
            'name' => 'required || unique:brands,name',
        ],[
            'name.required' => 'Yêu cầu tồn tại giá trị nhập',
            'name.unique' => 'Hãng xe đã tồn tại',
        ]);

        $brand = Brand::where('id',$id);
        $brand->update(['name' => $request->name]);
        
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
        Brand::where('id', $id)->delete();
        return redirect()->back();
    }

}
