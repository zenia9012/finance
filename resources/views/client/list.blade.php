@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h3>Клієнти Список</h3></div>
                </div>
                <p><a href="{{route('client_create')}}" class="btn btn-success">Створити нового клієнта</a></p>
                <div class="table">
                    <table class="table table-hover table-bordered table-striped">
                        <tr>
                            <th width="2%">#</th>
                            <th>Ім'я</th>
                            <th>Місто</th>
                            <th>Останнє замовлення</th>
                            <th>Нотатки</th>
                            <th>Сума замовлень</th>
                            <th width="5%"></th>
                            <th width="5%"></th>
                        </tr>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->city }}</td>
                                <td>{{ $client->last_order }}</td>
                                <td>{{ $client->notes }}</td>
                                <td>{{ $client->amount }}</td>
                                <td><a href="/client/update/{{ $client->id }}" class="btn btn-warning btn-sm">Редагувати</a></td>
                                <td><a href="/client/delete/{{ $client->id }}" class="btn btn-danger btn-sm">Видалити</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
