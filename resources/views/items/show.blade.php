@extends('layouts.app')
@section('title', 'Item view')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product overview</div>

                <div class="card-body">
                <h3>{{ $item->name }}</h3>
                {{ $item->image }}
                <p>
                    <img src="{{ $item->image }}" alt="[item-image]"><br>
                    Price: <strong>${{ $item->price }}</strong><br>
                    {{ $item->units }} units left<br>
                    {{ $item->description }}<br>
                </p>
                <p>
                    <a href="#">
                    <button type="button" class="btn btn-success">Add to cart</button>
                    </a>
                </p>
                @if (auth()->user()->hasAnyRole(['seller', 'admin']))
                <p>
                <a href="{{ url('items/'.$item->id.'/edit') }}">
                    <button type="button" class="btn btn-primary">Edit</button>
                </a>
                <form method="POST" action="/items/{{$item->id}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
            
                    <div class="form-group">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
                </p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
