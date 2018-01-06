@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h3>Створений новий товар</h3></div>
                </div>
                <div class="list">
                    <ul class="list-group">
                        <li class="list-group-item"><img src="{{  $path }}" alt=""></li>
                        <li class="list-group-item">{{ $product->id }}</li>
                        <li class="list-group-item">{{ $product->title }}</li>
                        <li class="list-group-item">{{ $product->category }}</li>
                        <li class="list-group-item">{{ $product->price_our }}</li>
                        <li class="list-group-item">{{ $product->price_sell }}</li>
                        <li class="list-group-item">{{ $product->material }}</li>
                        <li class="list-group-item">{{ $product->size }}</li>
                        <li class="list-group-item">{{ $product->notes }}</li>
                    </ul>
                </div>
                <div class="table">

                    <table class="table table-hover table-bordered table-striped">

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
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
