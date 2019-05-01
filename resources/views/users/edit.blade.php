@extends('layouts.app')
@section('title', 'Edit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit a user</div>
                <div class="card-body">
                    <form  method="POST" action="/users/{{ $user->id }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Email</label>
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Password</label>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                        </div>
                        <div class="form-group">
                            <label for="description">Confirm password</label>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation">
                        </div>
                        @if (auth()->user()->hasRole('admin'))
                        <div class="form-check" style="margin-bottom:1em">
                            <input class="form-check-input" type="checkbox" {{ $user->hasRole('seller') ? 'checked' : '' }} name="seller">
                            <label class="form-check-label" for="seller">
                                Seller account
                            </label>
                        </div>
                        @endif
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
