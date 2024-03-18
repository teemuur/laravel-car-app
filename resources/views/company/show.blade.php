@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h2>Компании</h2>
        <table class="table table-striped mt-3">
            <thead>
            <tr>
                <th>Идентификатор</th>
                <th>Название компании</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$company->id}}</td>
                <td>{{$company->name}}</td>
                <td>
                    <a href="{{route("company.edit", $company->id)}}">
                        <button class="btn btn-sm btn-block btn-primary">Edit</button>
                    </a>
                    <form action="{{route("company.delete", $company->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger btn-block btn-sm mt-2">
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
        <a href="{{ route('company.index') }}">Вернуться назад</a>
    </div>
@endsection
