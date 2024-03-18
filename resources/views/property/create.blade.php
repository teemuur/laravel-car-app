@extends('layout.app')

@section('content')
    @php
        $car_property_types = [
            0 => 'String',
            1 => 'Integer',
            3 => 'JSON',
            7 => 'Boolean'
        ];
    @endphp
    <div class="container mt-5">
        <h2>Свойства машин</h2>
        <form action="{{route('property.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Введите название свойства</label>
                <input type="text" name="name" id="name" class="form-control">
                <label for="type">Тип свойства</label>
                <select class="form-control form-control-lg" id="type" name="type">
                    @foreach($car_property_types as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Записать свойство в БД</button>
        </form>
    </div>
    <hr>
@endsection
