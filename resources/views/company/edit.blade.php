@extends('layout.app')

@section('content')

    <div class="container mt-5">
        <h2>Компания с идентификатором: {{$company->id}}</h2>
        <form action="{{ route('company.update', $company->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Новое название компании:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$company->name}}">
            </div>
            <button type="submit" class="btn btn-success">Обновить данные в БД</button>
        </form>
    </div>
    <hr>
@endsection
