@extends('layouts.app')
@section('title', 'Payment')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment information<img src="http://i76.imgup.net/accepted_c22e0.png" style="margin-left: 20px"></div>

                <div class="card-body">
                    @php
                        $user = auth()->user();
                        if(isset($user->stripe_id)) {
                            $cards = Stripe::cards()->all($user->stripe_id);
                            //dd($cards);
                        }
                    @endphp
                    @if (!empty($cards['data']))
                        @foreach ($cards['data'] as $card)
                            <table class="table">
                                <tbody>
                                    <tr>
                                    <td>Credit card number</td>
                                    <td>**** **** **** {{ $card['last4'] }}</td>
                                    </tr>
                                    <tr>
                                    <td>Card brand</td>
                                    <td>{{ $card['brand'] }}</td>
                                    </tr>
                                    <tr>
                                    <td>Expiration date</td>
                                    <td>{{ $card['exp_month'] }}/{{ $card['exp_year'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <form method="POST" action="/payment/delete">
                                @csrf
                                <input type="hidden" name="card_id" value="{{ $card['id'] }}">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </div>
                            </form>
                        @endforeach
                    @else
                        <p>You don't have any payment information yet.</p>
                    @endif
                    <a href="{{ url('payment/create') }}">
                        <button type="button" class="btn btn-primary">Add payment information</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
