@extends('layouts.app')
@section('title', 'Create')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Choose a category</div>
                <div class="card-body">
                <a href="items/book/create">Book</a><br>
                <a href="items/music/create">Music</a><br>
                <a href="items/clothing/create">Clothing</a><br>
                <a href="items/create">Sports & Outdoors</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
