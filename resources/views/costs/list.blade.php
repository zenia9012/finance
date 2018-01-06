@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h3>Витрати Список</h3></div>
                </div>
                <p><a href="{{route('create_cost')}}" class="btn btn-success">Створити нову витрату</a></p>
                <div class="table">
                    <table class="table table-hover table-bordered table-striped">
                        <tr>
                            <th width="10%">#</th>
                            <th>Назва</th>
                            <th>Категорія</th>
                            <th>Нотатки</th>
                            <th>Сума</th>
                            <th>Дата</th>
                            <th width="5%"></th>
                            <th width="5%"></th>
                        </tr>
                        @foreach($costs as $cost)
                            <tr>
                                <td>{{ $cost->id }}</td>
                                <td>{{ $cost->title }}</td>
                                <td>{{ $cost->category }}</td>
                                <td>{{ $cost->notes }}</td>
                                <td>{{ $cost->price }}</td>
                                <td>{{ \Carbon\Carbon::parse($cost->created_at)->format('d-F-Y')}}</td>
                                <td><a href="#" class="btn btn-warning btn-sm">Редагувати</a></td>
                                <td><a href="/costs/delete/{{ $cost->id }}" class="btn btn-danger btn-sm">Видалити</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
