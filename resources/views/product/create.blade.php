@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>Продукт Створити</h3></div>
            </div>
            <form enctype="multipart/form-data" action="{{ route('product_confirm') }}" class="form-horizontal" id="product-data" method="post">
                {{csrf_field()}}
                <div class="col-md-6">
                    <div class="personal-data">
                        <div class="form-group" id="title">
                            <label for="title" class="col-sm-3 control-label">Назва</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-sm-3 control-label">Категорія</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="category" name="category">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price_our" class="col-sm-3 control-label">Собівартість</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="price_our" name="price_our">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price_sell" class="col-sm-3 control-label">Ціна</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="price_sell" name="price_sell">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="material" class="col-sm-3 control-label">Матеріал</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="material" name="material">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="size" class="col-sm-3 control-label">Розмір</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="size" name="size">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="notes" class="col-sm-3 control-label">Нотатки</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control " id="notes" name="notes">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="photo_path" class="col-sm-3 control-label">Фото</label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="photo_path" name="photo_path">
                            </div>
                        </div>
                        @if($errors->any())
                            <div class="row">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        @endif
                        @isset($message)
                            <div class="row">
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{{$message}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        @endisset
                    </div>
                    <div class="form-gorup text-center">
                        <button type="submit" class="btn btn-success">Додати</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
