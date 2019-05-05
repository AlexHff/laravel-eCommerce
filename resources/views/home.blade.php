@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Welcome, {{ auth()->user()->name }}!</p>
                    @if (auth()->user()->hasRole(['admin']))
                        <p><a href="users/">All users</a><br>
                        <a href="users/create">Create a new user</a></p>
                    @endif
                    <p><a href="{{ route('cart.show') }}"  style="color:inherit; text-decoration: none">
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary">My Cart</button>
                    </a></p>
                    <p><a href="/users/{{ auth()->user()->id }}"  style="color:inherit; text-decoration: none">
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary">My Profile</button>
                    </a></p>
                    <p><a href="/payment/show"  style="color:inherit; text-decoration: none">
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary">My Payment information</button>
                    </a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
