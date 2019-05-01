@extends('layouts.app')
@section('title', 'My Cart')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Cart</div>

                <div class="card-body">
                @if (Cart::count() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Item name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                                <tr>
                                <td>{{ $item->name }}</td>
                                <td>${{ $item->price }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->total }}</td>
                                <td>
                                    <form method="POST" action="{{ route('cart.delete') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                        </div>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td><strong>Total</strong></td>
                                <td><strong>{{ Cart::total() }}</strong></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                    <form method="POST" action="">
                        {{ csrf_field() }}
                        <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Proceed to checkout">
                        </div>
                    </form>
                @else
                    <p>Your cart is empty.</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
