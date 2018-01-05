<div class="col-md-12 center-block" style="margin-top: 30px;">

    <div class="panel panel-danger text-center">
        <h3>
            Рекомендую подивитися також інщі наші продукти
        </h3>
    </div>

    @foreach($jams as $jam)

        @isset($product)
            @if( $jam->id != $product->id)

                <div class="col-md-2">
                    <div class="panel panel-default text-center">
                        <a href="{{$jam->id}}">
                            <h3>{{$jam->title}}</h3>
                        </a>
                        <a href="{{$jam->id}}">
                            <div style="height: 150px" class="image-main">
                                <img width="100%" src="{{asset('img/'. $jam->img_path)}}" alt="">
                            </div>
                        </a>
                        <a href="{{$jam->id}}">
                            <p>{{$jam->description}}</p>
                        </a>
                        <a href="{{$jam->id}}">
                            <p>{{$jam->price}} грн.</p>
                        </a>
                        <a href="{{$jam->id}}">
                            <button class="buy-btn btn btn-success">Купити</button>
                        </a>
                    </div>
                </div>

            @endif
        @endisset

        @empty($product)

            <div class="col-md-2">
                <div class="panel panel-default text-center">
                    <a href="{{$jam->id}}">
                        <h3>{{$jam->title}}</h3>
                    </a>
                    <a href="{{$jam->id}}">
                        <div style="height: 150px" class="image-main">
                            <img width="100%" src="{{asset('img/'. $jam->img_path)}}" alt="">
                        </div>
                    </a>
                    <a href="{{$jam->id}}">
                        <p>{{$jam->description}}</p>
                    </a>
                    <a href="{{$jam->id}}">
                        <p>{{$jam->price}} грн.</p>
                    </a>
                    <a href="{{$jam->id}}">
                        <button class="buy-btn btn btn-success">Купити</button>
                    </a>
                </div>
            </div>

        @endempty

    @endforeach
</div>