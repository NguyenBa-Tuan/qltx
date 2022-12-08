<div class="filter d-flex mb-4">
    <span class="me-2">
        Sắp xếp theo:
    </span>
    <form action="{{route('index')}}" method="GET">
        <label>
            Giá từ
            <input type="text" name="price_from">
            đến
            <input type="text" name="price_to">
        </label>
        <label class="ms-4">
            Dòng xe
            <select name="name" id="">
                <option value="" selected>--Loại xe--</option>
                @foreach($list_car as $car)
                <option value="{{$car->name}}">
                    {{$car->name}}
                </option>
                @endforeach
            </select>
        </label>
        <button type="submit" class="btn btn-primary ms-2">
            Lọc
        </button>
    </form>
</div>