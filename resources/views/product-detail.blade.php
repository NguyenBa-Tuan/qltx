@extends('layouts.master')
@section('content')
<div class="py-5 deil-tail">
    <div class="container">
        @if (Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{{Session::get('success')}}</li>
            </ul>
        </div>
        @elseif(Session::has('error'))
        <div class="alert alert-warinng">
            <ul>
                <li>{{Session::get('error')}}</li>
            </ul>
        </div>
        @endif
        <h1 class="title mb-5">
            Tên xe
        </h1>
        <div class="content d-flex justify-content-between">
            <div class="img me-3">
                <img class="mw-100" src="{{asset('public/Image/' . $vehicle->image)}}" alt="" srcset="">
            </div>

            <div class="intro">
                <div class="info mb-4">
                    <li class="mb-2">Dòng xe: {{$vehicle->name}}</li>
                    <li class="mb-2">Giá theo ngày: {{$vehicle->price_day}}</li>
                    <!-- <li class="mb-2">Giá theo ngày: </li>
                    <li class="mb-2">Giá theo ngày: </li> -->
                    <li class="mb-2">Biển số xe: {{$vehicle->license_plates}}</li>
                    <li class="mb-2">Loại nhiên liệu: {{$vehicle->fuel_type}}</li>
                    <li class="mb-2">Hãng xe: {{$vehicle->brand->name}}</li>
                    <li class="mb-2">Mô tả: {{$vehicle->overview}}</li>
                </div>
                <form action="{{route('index.booking', $vehicle->id)}}" class="d-flex justify-content-between" method="POST">
                    @csrf
                    <div class="d-flex flex-column">
                        <label class="mb-2">
                            Ngày đặt xe:
                            <input type="date" class="ms-2" name="from_data">
                        </label>
                        <label>
                            Ngày trả xe:
                            <input type="date" class="ms-2" name="to_data">
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">Đặt xe</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection