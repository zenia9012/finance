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
                <div class="buttons">
                    <a href="{{route('product_list')}}" class="btn btn-success">Підтвердити</a>
                    <a href="{{route('product_update')}}" class="btn btn-warning">Редагувати</a>
                    <a href="{{route('product_delete')}}" class="btn btn-danger">Видалити</a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
