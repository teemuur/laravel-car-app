@extends('layout.app')

@section('content')

    <div class="container mt-5">
        <h2>Компании</h2>
        <form action="{{ route('company.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Введите название компании</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Сохранить данные в БД</button>
        </form>
    </div>
    <hr>
@endsection
