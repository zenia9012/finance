@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>Замовлення Створити</h3></div>
            </div>
            <form action="" class="form-horizontal" id="order-data" method="post">
                {{csrf_field()}}
                <div class="col-md-6">
                    <div class="personal-data">
                        <div class="form-group">
                            <label for="product" class="col-sm-3 control-label">Продукт</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="product" name="product" disabled value="{{ $product->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="client" class="col-sm-3 control-label">Клієнт</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="client" name="client" disabled value="{{ $client->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deadline" class="col-sm-3 control-label">Термін</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="deadline" name="deadline" value="{{ $order->deadline }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="amount" class="col-sm-3 control-label">Сума</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="amount" name="amount" value="{{ $order->amount }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Статус</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" id="status">
                                    <option value="new">New</option>
                                    <option value="complete">Complete</option>
                                    <option value="cancel">Cancel</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="notes" class="col-sm-3 control-label">Нотатки</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control " id="notes" name="notes" value="{{ $order->notes }}">
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
