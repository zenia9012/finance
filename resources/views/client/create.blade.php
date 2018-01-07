@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>Клієнт Створити</h3></div>
            </div>
            <form action="" class="form-horizontal" id="client-data" method="post">
                {{csrf_field()}}
                <div class="col-md-6">
                    <div class="personal-data">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Ім'я</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-3 control-label">Телефон</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="facebook" class="col-sm-3 control-label">Facebook</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="facebook" name="facebook">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-sm-3 control-label">Місто</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="city" name="city">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="notes" class="col-sm-3 control-label">Нотатки</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control " id="notes" name="notes">
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
