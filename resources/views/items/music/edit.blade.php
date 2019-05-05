@extends('layouts.app')
@section('title', 'Edit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit a music</div>
                <div class="card-body">
                    <form  method="POST" action="/items/{{ $item->id }}/music" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name" value="{{ $item->name }}">
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}" name="author" placeholder="Author" value="{{ $item->music->author }}">
                        </div>
                        <div class="form-group">
                            <label for="album">Album</label>
                            <input type="text" class="form-control{{ $errors->has('album') ? ' is-invalid' : '' }}" name="album" placeholder="Album" value="{{ $item->music->album }}">
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
