@extends('admin.layout')

@section('title', 'Brand')

@section('sidebar')
    @parent
@endsection

@section('content')
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Tên xe</th>
            <th scope="col">Giá theo ngày</th>
            <th scope="col">Năm sản xuất</th>
            <th scope="col">Số chỗ ngồi</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Biển số xe</th>
            <th scope="col">Loại nhiên liệu</th>
            <th scope="col">Hãng xe</th>
            <th scope="col">Xóa</th>
            <th scope="col">Sửa</th>
          </tr>
        </thead>
        <tbody>
            
            @foreach ($data as $key => $value)
                <tr>
                    <td>{{$value->name}}</td>
                    <td>{{$value->price_day}}</td>
                    <td>{{$value->model_year}}</td>
                    <td>{{$value->seating_capacity}}</td>
                    <td>{{$value->overview}}</td>
                    <td><img style="max-width: 200px" src="{{asset('public/Image/'.$value->image)}}"></td>
                    <td>{{$value->license_plates}}</td>
                    <td>{{$value->fuel_type}}</td>
                    <td>{{$value->brand_name}}</td>
                    <td>
                        <form role="form" action="{{route('vehicle.destroy', $value->id)}}" method="post">
                            @method('DELETE')
                            <button type="submit" class="btn btn-default btn-danger ">Xóa <i class="bi bi-x"></i></button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                        {{-- <a href="" class="btn btn-danger">Xóa <i class="bi bi-x"></i></a> --}}
                    </td>
                    <td>
                        <div class="edit-vehicle rounded-3 p-4">
                            <div class="text-end fs-3"><span class="hide-edit-vehicle">X</span></div>
                            <form action="{{route('vehicle.update', $value->id)}}" method="POST" enctype="multipart/form-data" class="popup">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <label class="col">
                                        Tên xe
                                        <input class="w-100 mb-1 rounded-3 form-control" type="text" name="name" value="{{ $value->name }}">
                                    </label>
                                    <label class="col">
                                        Giá theo ngày
                                        <input class="w-100 mb-1 rounded-3 form-control" type="number" name="price_day" value="{{ $value->price_day }}">
                                    </label>
                                </div>
                                <div class="row">
                                    <label class="col">
                                        Năm sản xuất
                                        <input class="w-100 mb-1 rounded-3 form-control" type="text" name="model_year" value="{{ $value->model_year }}">
                                    </label>
                                    <label class="col">
                                        Số chỗ ngồi
                                        <input class="w-100 mb-1 rounded-3 form-control" type="text" name="seating_capacity" value="{{ $value->seating_capacity }}">
                                    </label>
                                </div>
                                <div class="row">
                                    <label class="col">
                                        Biển số xe
                                        <input class="w-100 mb-1 rounded-3 form-control" type="text" name="license_plates" value="{{ $value->license_plates }}">
                                    </label>
                                    <label class="col mb-1">
                                        Loại nhiên liệu: <br>
                                        <div class="form-check form-check-inline">
                                            <label>
                                                @if ($value->fuel_type == "máy dầu")
                                                    <input class="form-check-input" checked type="radio" name="fuel_type" value="máy dầu">
                                                @else
                                                    <input class="form-check-input" checked type="radio" name="fuel_type" value="máy dầu">
                                                @endif
                                                máy dầu
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label>
                                                @if ($value->fuel_type == "máy xăng")
                                                    <input class="form-check-input" checked type="radio" name="fuel_type" value="máy xăng">
                                                @else
                                                    <input class="form-check-input" checked type="radio" name="fuel_type" value="máy xăng">
                                                @endif
                                                máy xăng
                                            </label>
                                        </div>
                                    </label>
                                </div>
                                <div class="row">
                                    <label class="col">
                                        Lựa chọn hãng xe
                                        <select class="form-control form-control-lg" name="brand_id">
                                            
                                            @foreach ($data_brand as $key => $brand)
                                                @if ($value->brand_id == $brand->brand_id)
                                                    <option value="{{$brand->id}}" selected>{{ $brand->name }}</option>
                                                @else
                                                    <option value="{{$brand->id}}">{{ $brand->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </label>
                                    <label class="col">
                                        Chọn ảnh của xe
                                        <input class="w-100 mb-1 rounded-3 form-control image" type="file" name="image" value="{{ $value->image }}">
                                        <img style="max-width: 200px" src="{{asset('public/Image/'.$value->image)}}">
                                    </label>
                                </div>
                                <div class="row">
                                    <label class="col">
                                        Mô tả xe    
                                        <textarea style="text-align: start" class="w-100 mb-1 rounded-3 form-control" name="overview" rows="3">{{ $value->overview }}</textarea>
                                    </label>
                                </div>
                                <button style="margin-top: 20px;" type="submit" class="btn btn-primary mx-auto mg-t-10">Sửa</button>
                            </form>
                        </div>
                        <button type="submit" class="btn btn-primary show-edit-vehicle">Sửa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="content-bt">
        {{ $data->appends(Request::all())->links() }}
        <form action="{{ Route('vehicle.store') }}" method="POST" class="w-100 flex-column input-group" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <label class="col">
                    Tên xe
                    <input class="w-100 mb-1 rounded-3 form-control" type="text" name="name">
                </label>
                <label class="col">
                    Giá theo ngày
                    <input class="w-100 mb-1 rounded-3 form-control" type="number" name="price_day">
                </label>
            </div>
            <div class="row">
                <label class="col">
                    Năm sản xuất
                    <input class="w-100 mb-1 rounded-3 form-control" type="text" name="model_year">
                </label>
                <label class="col">
                    Số chỗ ngồi
                    <input class="w-100 mb-1 rounded-3 form-control" type="text" name="seating_capacity">
                </label>
            </div>
            <div class="row">
                <label class="col">
                    Biển số xe
                    <input class="w-100 mb-1 rounded-3 form-control" type="text" name="license_plates">
                </label>
                <label class="col mb-1">
                    Loại nhiên liệu: <br>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="fuel_type" value="máy dầu">
                            máy dầu
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="fuel_type" value="máy xăng">
                            máy xăng
                        </label>
                    </div>
                </label>
            </div>
            <div class="row">
                <label class="col">
                    Lựa chọn hãng xe
                    <select class="form-control form-control-lg" name="brand_id">
                        @foreach ($data_brand as $key => $value)
                            <option value="{{$value->id}}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="col">
                    Chọn ảnh của xe
                    <input class="w-100 mb-1 rounded-3 form-control" type="file" name="image">
                </label>
            </div>
            <div class="row">
                <label class="col">
                    Mô tả xe    
                    <textarea class="w-100 mb-1 rounded-3 form-control" name="overview" rows="3"></textarea>
                </label>
            </div>
            <button style="height: 50px;" class="w-25 vh-2 mx-auto mt-3 rounded-pill btn-primary" type="submit">Thêm xe</button>
        </form>
    </div>
@endsection