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
                <img src="{{ $user->user_image }}" alt="[profile-image]" style="max-width:600px;"><br>
                <img src="{{ $user->background_image }}" alt="[background-image]" style="max-width:600px;"><br>
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
                        <tr>
                        <td>First name</td>
                        <td>{{ $user->firstname }}</td>
                        </tr>
                        <tr>
                        <td>Last name</td>
                        <td>{{ $user->lastname }}</td>
                        </tr>
                        <tr>
                        <td>Address 1</td>
                        <td>{{ $user->address1 }}</td>
                        </tr>
                        <tr>
                        <td>Address 2</td>
                        <td>{{ $user->address2 }}</td>
                        </tr>
                        <tr>
                        <td>City</td>
                        <td>{{ $user->city }}</td>
                        </tr>
                        <tr>
                        <td>Postal code</td>
                        <td>{{ $user->postal }}</td>
                        </tr>
                        <tr>
                        <td>Country</td>
                        <td>{{ $user->country }}</td>
                        </tr>
                        <tr>
                        <td>Phone</td>
                        <td>{{ $user->phone }}</td>
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
