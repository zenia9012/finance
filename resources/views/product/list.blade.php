@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h3>Товари Список</h3></div>
                </div>
                <p><a href="{{route('product_create')}}" class="btn btn-success">Створити новий товар</a></p>
                <div class="table">
                    <table class="table table-hover table-bordered table-striped">
                        <tr>
                            <th width="2%">#</th>
                            <th>Фото</th>
                            <th>Назва</th>
                            <th>Категорія</th>
                            <th>Собівартість</th>
                            <th>Продажна ціна</th>
                            <th>Матеріал</th>
                            <th>Розмір</th>
                            <th>Нотатки</th>
                            <th width="5%"></th>
                            <th width="5%"></th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>photo</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->price_our }}</td>
                                <td>{{ $product->price_sell }}</td>
                                <td>{{ $product->material }}</td>
                                <td>{{ $product->size }}</td>
                                <td>{{ $product->notes }}</td>
                                <td><a href="/product/update/{{ $product->id }}" class="btn btn-warning btn-sm">Редагувати</a></td>
                                <td><a href="/product/delete/{{ $product->id }}" class="btn btn-danger btn-sm">Видалити</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
