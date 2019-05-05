@extends('layouts.app')
@section('title', 'Users')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="text-align:center; margin: 20px 0 20px 0">
        @if (!$users->isEmpty())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a href="{{ url('users/'.$user->id) }}" style="color: inherit">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>No results.</p>
        @endif
    </div>
</div>
@endsection
