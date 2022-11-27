@extends('admin.layout')

@section('title', 'Brand')

@section('sidebar')
    @parent
@endsection

@section('content')
    <table class="table">
        <thead>
          <tr>
            <th scope="col">stt</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Xóa</th>
            <th scope="col">sửa</th>
          </tr>
        </thead>
        <tbody>
            
            @foreach ($data as $key => $value)
                <tr>
                    <th scope="row"> @php
                        echo $key+1;
                    @endphp</th>
                    <td>{{$value->name}}</td>
                    <td>
                        <form role="form" action="{{route('brand.destroy', $value->brand_id)}}" method="post">
                            @method('DELETE')
                            <button type="submit" class="btn btn-default btn-danger ">Xóa <i class="bi bi-x"></i></button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                        {{-- <a href="" class="btn btn-danger">Xóa <i class="bi bi-x"></i></a> --}}
                    </td>
                    <td>
                        <form action="{{route('brand.update', $value->brand_id)}}" method="POST" enctype="multipart/form-data" class="popup">
                            @method('PUT')
                            @csrf
                            <label for="title" class="form-label">
                                Tên Hãng xe
                            </label>
                            <input type="text" name="name" id="title" class="form-control" placeholder="{{$value->name}}" value="{{$value->name}}">
                            
                            <button style="margin-top: 20px;" type="submit" class="btn btn-primary mg-t-10">Sửa</button>
                        </form>
                        {{-- <button type="submit" class="btn btn-primary show-popup">Sửa</button> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex content-bt">
        {{ $data->appends(Request::all())->links() }}
        <form action="{{ Route('brand.store') }}" method="POST" class="ms-auto w-25 input-group">
            @csrf
            <input class="form-control" type="text" name="name" id="brand_name">
            <button type="submit">Thêm hãng xe</button>
        </form>
    </div>
@endsection