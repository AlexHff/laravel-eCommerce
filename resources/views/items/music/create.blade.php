@extends('layouts.app')
@section('title', 'Create')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a music</div>
                <div class="card-body">
                    <form  method="POST" action="{{ route('items.music.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label> <span style="color: red !important; display: inline; float: none;">*</span>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label> <span style="color: red !important; display: inline; float: none;">*</span>
                            <input type="text" class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}" name="author" placeholder="Author" value="{{ old('author') }}">
                        </div>
                        <div class="form-group">
                            <label for="album">Album</label> <span style="color: red !important; display: inline; float: none;">*</span>
                            <input type="text" class="form-control{{ $errors->has('album') ? ' is-invalid' : '' }}" name="album" placeholder="Album" value="{{ old('album') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label> <span style="color: red !important; display: inline; float: none;">*</span>
                            <input type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="Description" value="{{ old('description') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label> <span style="color: red !important; display: inline; float: none;">*</span>
                            <input type="number" step="0.01" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" placeholder="Price"min="0" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label> <span style="color: red !important; display: inline; float: none;">*</span>
                            <input type="file" name="image">
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
