@extends('layouts.master')
@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Xe</th>
                <th>Trạng thái</th>
                <th>Ngày thuê</th>
                <th>Ngày trả</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key=>$value)
            <tr>
                <td>{{$key +1}}</td>
                <td>{{$value->vehicles_name}}</td>
                @switch($value->status)
                @case(0)
                <td>Chờ xác nhận</td>
                @break
                @case(1)
                <td>Đang thuê</td>
                @break
                @case(2)
                <td>Bị từ chối</td>
                @break
                @default
                <td>Error</td>
                @endswitch
                <td>{{$value->from_data}}</td>
                <td>{{$value->to_data}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection