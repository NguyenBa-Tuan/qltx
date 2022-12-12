@extends('admin.layout')

@section('title', 'Revenue')

@section('sidebar')
@parent
@endsection

@section('content')
<table class="table">
    @forelse($attrs as $key=>$data)
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

        <tr>
            <td>{{$key}}</td>
        </tr>
        @foreach($data as $key=>$value)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$value['user_name']}}</td>
            <td>{{$value['created_at']}}</td>
            <td>{{$value['vehicles_name']}}</td>
            <td>{{$value['license_plates']}}</td>
            <td>{{$value['from']}}</td>
            <td>{{$value['to']}}</td>
            <td>{{$value['status']}}</td>
        </tr>
        @endforeach
        @empty
        <tr>
            <td style="text-align: center">No data</td>
        </tr>

    </tbody>

    @endforelse
</table>
@endsection