@extends('layouts.master')

@section('content')
@include('layouts.banner')
<div class="list-car py-5">
    <div class="container">
        <h2 class="title text-center mb-4">
            Các dòng xe phổ biến
        </h2>
        @include('filter')
        <div class="row">
            @forelse($vehicles as $vehicle)
            <div class="col-md-4 mb-4">
                <div class="item">
                    <div class="img">
                        <a href="{{route('index.product-detail', $vehicle->id)}}"><img src="{{asset('public/Image/' . $vehicle->image)}}" alt="{{$vehicle->name}}" srcset=""></a>
                    </div>
                    <div class="info p-3">
                        <h4>
                            <a href="{{route('index.product-detail', $vehicle->id)}}">{{$vehicle->name}}</a>
                        </h4>
                        <div class="bt d-flex justify-content-between">
                            <span>Loại xe: {{$vehicle->brand->name}}</span>
                            <span>Giá xe: {{$vehicle->price_day}}</span>
                        </div>
                    </div>
                </div>

            </div>
            @empty
            <p style="text-align: center">No data</p>
            @endforelse
        </div>
        {{-- $vehicles->links() --}}
    </div>
</div>
@endsection