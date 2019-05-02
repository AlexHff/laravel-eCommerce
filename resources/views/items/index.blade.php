@extends('layouts.app')
@section('title', 'Items')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (!$items->isEmpty())
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Units</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <a href="{{ url('items/'.$item->id) }}" style="color:inherit; text-decoration: none">
                                    {{ $item->name }}
                                </a>
                            </td>
                            <td>{{ $item->description }}</td>
                            <td>${{ $item->price }}</td>
                            <td>{{ $item->units }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No results.</p>
        @endif
    </div>
</div>
@endsection
