@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h2>Машины</h2>
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
            <tr>
                <td>{{$car->id}}</td>
                <td>{{$car->name}}</td>
                <td>{{$car->company ? $car->company->name: "Компания не указана"}}</td>
                <td>
                    @foreach($car->properties as $property)
                        <li>{{ $property->name }}: {{ $property->pivot->property_value }}</li>
                    @endforeach
                </td>
                <td>
                    <a href="{{route("car.edit", $car->id)}}">
                        <button class="btn btn-sm btn-block btn-primary">Edit</button>
                    </a>
                    <form action="{{route("car.delete", $car->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger btn-block btn-sm mt-2">
                    </form>
                </td>
            </tr>

            </tbody>
        </table>
        <a href="{{ route('car.index') }}">Вернуться назад</a>
    </div>
@endsection
