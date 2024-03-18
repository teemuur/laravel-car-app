@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h2>Свойства машин</h2>
        <a href="{{route('property.create')}}">
            <button class="btn btn-success">Добавить свойство</button>
        </a>
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
            @php
                $car_property_types = [
                    0 => 'String',
                    1 => 'Integer',
                    3 => 'JSON',
                    7 => 'Boolean'
                ];
            @endphp
            @foreach($properties as $el)
                <tr>
                    <td>{{$el->id}}</td>
                    <td>{{$el->name}}</td>
                    <td>{{$car_property_types[$el->type]}}</td>
                    <td><a href="{{ route('property.show', $el->id) }}">
                            <button class="btn btn-block btn-primary">Показать</button>
                        </a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
