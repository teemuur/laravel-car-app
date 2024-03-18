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
        <h2>Свойство машины</h2>
        <table class="table table-striped mt-3">
            <thead>
            <tr>
                <th>Идентификатор</th>
                <th>Название свойства</th>
                <th>Тип свойства</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$property->id}}</td>
                <td>{{$property->name}}</td>
                <td>{{$car_property_types[$property->type] }}</td>
                <td><a href="{{route("property.edit", $property->id)}}">
                        <button class="btn btn-sm btn-block btn-primary">Edit</button>
                    </a>
                    <form action="{{route("property.delete", $property->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger btn-block btn-sm mt-2">
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
        <a href="{{ route('property.index') }}">Вернуться назад</a>
    </div>
@endsection
