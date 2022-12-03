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
            <th></th>
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
            @case(2)
            <td>Từ chối</td>
            @break
            @case(3)
            <td>Đã trả xe</td>
            @break
            @default
            <td>Error</td>
            @endswitch
            <td>
                <form action="{{route('admin.requestRent', $value->id)}}" method="POST" id="carform">
                    @csrf
                    <select name="status">
                        <option value="1">Đang thuê</option>
                        <option value="3">Đã trả xe</option>
                    </select>
                    <button type="submit">Submit</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection