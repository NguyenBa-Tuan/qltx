@extends('admin.layout')

@section('title', 'Booking history')

@section('sidebar')
@parent
@endsection

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Người thuê</th>
            <th scope="col">Thời gian đk</th>
            <th scope="col">Loại xe</th>
            <th scope="col">Biển số xe</th>
            <th scope="col">Ngày bắt đầu thuê</th>
            <th scope="col">Ngày trả xe</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $key => $value)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$value->user_name}}</td>
            <td>{{$value->created_at}}</td>
            <td>{{$value->vehicles_name}}</td>
            <td>{{$value->license_plates}}</td>
            <td>{{$value->from_data}}</td>
            <td>{{$value->to_data}}</td>
            @switch($value->status)
            @case(0)
            <td>Chờ duyệt</td>
            @break
            @case(1)
            <td>Đang thuê</td>
            @break
            @case(1)
            <td>Bị từ chối</td>
            @break
            @default
            <td>Error</td>
            @endswitch
        </tr>
        @endforeach
    </tbody>
</table>
@endsection