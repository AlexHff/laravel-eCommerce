@extends('layouts.app')
@section('title', 'Edit item')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit an item</div>
                <div class="card-body">
                    <form  method="POST" action="/items/{{ $item->id}}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $item->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Description" value="{{ $item->description }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" placeholder="Price" value="{{ $item->price }}" min="0">
                        </div>
                        <div class="form-group">
                            <label for="units">Units</label>
                            <input type="number" class="form-control" name="units" placeholder="Units" value="{{ $item->units }}" min="0">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
