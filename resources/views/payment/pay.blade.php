@extends('layouts.app')
@section('title', 'Payment')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Payment login verification<img src="http://i76.imgup.net/accepted_c22e0.png" style="margin-left: 20px"></div>

                <div class="card-body">
                    @if (auth()->user()->address1 == null && auth()->user()->postal == null)
                        <p>Please indicate a shipping address and come back to this page.</p>
                    @else
                        <form  method="POST" action="{{ route('payment.validation') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="name">Password</label>
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter your password">
                            </div>
                            <button type="submit" class="btn btn-success">Pay now ${{ Cart::total() }}</button>
                        </form>
                    @endif
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
                    @if (session('error'))
                    <br>
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
