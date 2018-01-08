@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h3>Замовлення Список</h3></div>
                </div>
                <p><a href="{{route('order_create')}}" class="btn btn-success">Створити нове замовлення</a></p>
                <div class="table">
                    <table class="table table-hover table-bordered table-striped">
                        <tr>
                            <th width="2%">#</th>
                            <th>Продукт</th>
                            <th>Клієнт</th>
                            <th>Термін</th>
                            <th>Сума</th>
                            <th>Статус</th>
                            <th>Нотатки</th>
                            <th width="5%"></th>
                            <th width="5%"></th>
                        </tr>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->product_id }}</td>
                                <td>{{ $order->client_id }}</td>
                                <td>{{ $order->deadline }}</td>
                                <td>{{ $order->amount }}</td>
                                <td>{{ $order->stutus }}</td>
                                <td>{{ $order->notes }}</td>
                                <td><a href="/order/update/{{ $order->id }}" class="btn btn-warning btn-sm">Редагувати</a></td>
                                <td><a href="/order/delete/{{ $order->id }}" class="btn btn-danger btn-sm">Видалити</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
