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
        <h2>Свойство с идентификатором: {{$property->id}}</h2>
        <form action="{{ route('property.update', $property->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Новое название свойства</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$property->name}}">
                <div class="form-group">
                    <label for="type">Тип свойства</label>
                    <select class="form-control form-control-lg" id="type" name="type">
                        @foreach($car_property_types as $key => $value)
                            <option
                                {{ $property->type == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Обновить данные в БД</button>
        </form>
    </div>
    <hr>
@endsection
