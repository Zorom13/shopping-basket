@extends('layout')
@section('title', 'Items')
@section('content')
    <div class="container items">
        <div class="row">
            @foreach ($items as $item)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ $item->item_img }}" width="500" height="300">
                        <div class="caption">
                            <h4>{{ $item->name }}</h4>
                            <p>{{ $item->information, 50 }}</p>
                            <p><strong>Price: </strong> {{ $item->price }}$</p>
                            <p class="btn-holder"><a href="{{ url('add-to-basket/' . $item->id) }}"
                                    class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- End row -->
    </div>
@endsection
