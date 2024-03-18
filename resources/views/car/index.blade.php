@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h2>Машины</h2>
        <a href="{{route('car.create')}}">
            <button class="btn btn-success">Добавить машину</button>
        </a>
        <table class="table table-striped mt-3">
            <thead>
            <tr>
                <th>Идентификатор</th>
                <th>Название машины</th>
                <th>Владелец</th>
                <th>Свойства</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $el)
                <tr>
                    <td>{{$el->id}}</td>
                    <td>{{$el->name}}</td>
                    <td>{{$el->company ? $el->company->name: "Компания не указана"}}</td>
                    <td>
                        @foreach($el->properties as $property)
                            <li>{{ $property->name }}: {{ $property->pivot->property_value }}</li>
                        @endforeach
                    </td>
                    <td><a href="{{ route('car.show', $el->id) }}">
                            <button class="btn btn-block btn-primary">Показать</button>
                        </a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
