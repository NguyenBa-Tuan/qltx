@extends('admin.layout')

@section('title', 'Revenue')

@section('sidebar')
@parent
@endsection

@section('content')
@forelse($attrs as $key=>$data)
<table class="table" style="margin-bottom: 50px;" id="id_{{$key}}">
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
            <th scope="col">Giá tiền</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$key}}</td>
        </tr>
        @foreach($data as $key=>$value)
        <tr class="data">
            <td>{{$key + 1}}</td>
            <td>{{$value['user_name']}}</td>
            <td>{{$value['created_at']}}</td>
            <td>{{$value['vehicles_name']}}</td>
            <td>{{$value['license_plates']}}</td>
            <td>{{$value['from']}}</td>
            <td>{{$value['to']}}</td>
            <td>{{$value['status']}}</td>
            <td>{{$value['revenue']}}</td>
        </tr>
        @endforeach
        <tr>
            <td class="total"></td>
        </tr>
        @empty
        <tr>
            <td style="text-align: center">No data</td>
        </tr>
    </tbody>
</table>
@endforelse
@endsection
@section('admin-scripts')
<script>
    $(document).ready(function() {

        $('table').each(function() {
            var sum = 0;
            $(this).find('tbody tr.data').each(function() {
                var price = $(this).find('td:last-child').text()
                sum += Number(price);
            });
            $(this).find('.total').text('Total: ' + sum + 'đ');
        });
    });
</script>
@endsection