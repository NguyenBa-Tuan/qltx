@extends('admin.layout')

@section('title', 'Revenue')
<style>
    .filter_search {
        display: flex;
        align-items: baseline;
    }

    #validate_response {
        margin-left: 10px;
        color: red;
    }
</style>
@section('sidebar')
@parent
@endsection

@section('content')
<div class="filter_search">
    <form action="{{route('admin.revenueMonthFilterPost')}}" method="GET" id="filter_month_table">
        <input type="text" id="month" name="month" data-field="date" readonly style="border: 1px solid #000;">
        <div id="dtBox" style="border: 1px solid #000;"></div>
        <button type="submit">Filter</button>
    </form>

    <div id="validate_response"></div>
</div>
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
<script>
    $('#dtBox').DateTimePicker({
        dateFormat: "yyyy MM"
    });

    $('#filter_month_table').submit(function(e) {
        if ($('#filter_month_table input').val() <= 0) {
            e.preventDefault();
            $('#validate_response').text('Input trống!');
        }
    })
</script>
@endsection