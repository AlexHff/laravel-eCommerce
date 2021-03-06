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
                {{ $item->category }}
                <p>
                    @if (!isset($item->image2))
                        <img src="{{ $item->image }}" class="img-fluid" alt="[item-image]"><br>
                    @else
                        <div id="carousel" class="carousel" data-ride="carousel slide" data-interval="50000">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ $item->image }}" alt="First slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="{{ $item->image2 }}" alt="Second slide">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                        </div>
                    @endif
                    @if (isset($item->video))
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ $item->video }}" allowfullscreen></iframe>
                        </div>
                        <br>
                    @endif
                    Price: <strong>${{ $item->price }}</strong><br>
                    @if ($item->units == 0)
                        <span style="color: red !important; display: inline; float: none;">Out of stock!</span><br>
                    @else
                        @if ($item->category != 'Music')
                        {{ $item->units }} units left<br>
                        @endif
                    @endif
                    Description: {{ $item->description }}<br>
                    @switch($item->category)
                        @case('Book')
                            Author: {{ $item->book->author }}<br>
                            Release date: {{ $item->book->release }}
                            @break
                        @case('Music')
                            Author: {{ $item->music->author }}<br>
                            Album: {{ $item->music->album }}
                            @break
                        @case('Clothing')
                            Size: {{ $item->clothing->size }}
                            @break
                        @default
                    @endswitch
                </p>
                <p>
                    <form method="POST" action="{{ route('cart.add') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="itemId" value="{{ $item->id }}">
                        <div class="form-group">
                            <input type="number" class="form-control{{ $errors->has('units') ? ' is-invalid' : '' }}" name="units" min="1" value="{{ old('units') || 1 }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Add to cart">
                        </div>
                    </form>
                </p>
                @if ((auth()->user()->hasRole(['seller']) && auth()->user()->id == $item->seller_id) || auth()->user()->hasRole(['admin']))
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
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
