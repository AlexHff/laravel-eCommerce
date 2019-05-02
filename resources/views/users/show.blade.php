@extends('layouts.app')
@section('title', 'User profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User profile</div>

                <div class="card-body">
                <h3>{{ $user->name }}'s profile</h3>
                <table class="table">
                    <tbody>
                        <tr>
                        <td>Username</td>
                        <td>{{ $user->name }}</td>
                        </tr>
                        @if (auth()->user()->hasRole('admin') || auth()->user()->id === $user->id)
                        <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                        </tr>
                        @endif
                        <tr>
                        <td>Seller account</td>
                        <td>{{ $user->hasRole('seller') ? 'yes' : 'no' }}</td>
                        </tr>
                    </tbody>
                </table>
                @if (auth()->user()->hasRole('admin') || auth()->user()->id === $user->id)
                    <p>
                    <a href="{{ url('users/'.$user->id.'/edit') }}">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    </p>
                @endif
                @if (auth()->user()->hasRole('admin'))
                    <form method="POST" action="/users/{{$user->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </div>
                    </form>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
