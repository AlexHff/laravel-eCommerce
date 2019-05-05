@extends('layouts.app')
@section('title', "Today's deals")

@section('content')
<div class="container">
    <div class="row justify-content-center" style="text-align:center; margin: 20px 0 20px 0">
        @php
        $items = App\Item::orderBy('sales', 'desc')->paginate(3);
        @endphp
        @foreach ($items as $item)
            <div class="col-sm" style="margin-bottom: 2em">
                <p>
                    <a href="{{ url('items/'.$item->id) }}">
                        <img src="{{ $item->image }}" alt="[item-image]" style="max-width:300px;"><br>
                    </a>
                    <h4><a href="{{ url('items/'.$item->id) }}" style="color: inherit">{{ $item->name }}</a></h4>
                    {{ $item->category }}
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
            </div>
        @endforeach
    </div>
</div>
@endsection
