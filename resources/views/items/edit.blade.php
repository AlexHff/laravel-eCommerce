@extends('layouts.app')
@section('title', 'Edit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit an item</div>
                <div class="card-body">
                    <form  method="POST" action="/items/{{ $item->id }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name" value="{{ $item->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="Description" value="{{ $item->description }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" step="0.01" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" placeholder="Price" value="{{ $item->price }}" min="0">
                        </div>
                        <div class="form-group">
                            <label for="units">Units</label>
                            <input type="number" class="form-control{{ $errors->has('units') ? ' is-invalid' : '' }}" name="units" placeholder="Units" value="{{ $item->units }}" min="0">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" placeholder="Choose a category..." value="{{ $item->category }}">
                              <option>Book</option>
                              <option>Music</option>
                              <option>Clothing</option>
                              <option>Sports & Outdoors</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" value="{{ $item->image }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @if ($errors->any())
                    <br>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
