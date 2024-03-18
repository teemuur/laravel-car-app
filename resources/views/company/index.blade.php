@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h2>Компании</h2>
        <a href="{{route('company.create')}}">
            <button class="btn btn-success">Добавить компанию</button>
        </a>
        <table class="table table-striped mt-3">
            <thead>
            <tr>
                <th>Идентификатор</th>
                <th>Название компании</th>
                <th>Машины во владении</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $el)
                <tr>
                    <td>{{$el->id}}</td>
                    <td>{{$el->name}}</td>
                    <td>
                        @foreach($el->cars as $car)
                            <li>{{$car->name}}</li>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('company.show', $el->id) }}">
                            <button class="btn btn-block btn-primary">Показать</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
